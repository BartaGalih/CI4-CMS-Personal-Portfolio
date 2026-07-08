<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MessagesModel;

class Messages extends Controller
{
    protected $messagesModel;
    protected $session;

    public function __construct()
    {
        $this->messagesModel = new MessagesModel();
        $this->session = session();
        $this->checkAuth();
    }

    private function checkAuth()
    {
        if (!$this->session->get('admin_logged_in')) {
            redirect()->to('/admin/login')->send();
            exit;
        }
    }

    public function index()
    {
        $data = [
            'page_title' => 'Management Messages',
            'messages'   => $this->messagesModel
                ->orderBy('created_at', 'DESC')
                ->findAll(),
        ];

        return view('admin/messages/index', $data);
    }

    public function detail($id)
    {
        $message = $this->messagesModel->find($id);

        if (!$message) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pesan tidak ditemukan');
        }

        // otomatis menjadi dibaca saat dibuka
        if ($message['status'] == 'baru') {

            $this->messagesModel->update($id, [
                'status' => 'dibaca'
            ]);

            $message['status'] = 'dibaca';
        }

        return view('admin/messages/detail', [
            'page_title' => 'Detail Pesan',
            'message'    => $message,
        ]);
    }

    public function markRead($id)
    {
        $message = $this->messagesModel->find($id);

        if (!$message) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pesan tidak ditemukan');
        }

        $this->messagesModel->update($id, [
            'status' => 'dibaca'
        ]);

        $this->session->setFlashdata(
            'success',
            'Pesan ditandai sebagai dibaca.'
        );

        return redirect()->to('/admin/messages/detail/' . $id);
    }

    public function markUnread($id)
    {
        $message = $this->messagesModel->find($id);

        if (!$message) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pesan tidak ditemukan');
        }

        $this->messagesModel->update($id, [
            'status' => 'baru'
        ]);

        $this->session->setFlashdata(
            'success',
            'Pesan ditandai sebagai belum dibaca.'
        );

        return redirect()->to('/admin/messages');
    }

    public function delete($id)
    {
        $message = $this->messagesModel->find($id);

        if (!$message) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pesan tidak ditemukan');
        }

        $this->messagesModel->delete($id);

        $this->session->setFlashdata(
            'success',
            'Pesan berhasil dihapus.'
        );

        return redirect()->to('/admin/messages');
    }
}