<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MessagesModel;

class FormMessages extends Controller
{
    protected $messagesModel;
    protected $session;

    public function __construct()
    {
        $this->messagesModel = new MessagesModel();
        $this->session = session();
    }

    public function store()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->back();
        }

        $rules = [
            'nama' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'subjek' => 'required|min_length[5]|max_length[200]',
            'pesan' => 'required|min_length[10]|max_length[5000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'subjek' => $this->request->getPost('subjek'),
            'pesan' => $this->request->getPost('pesan'),
            'status' => 'baru',
        ];

        if ($this->messagesModel->save($data)) {
            $this->session->setFlashdata('success', 'Pesan Anda telah berhasil dikirim! Kami akan segera merespons.');
            return redirect()->to('/#contact');
        } else {
            $this->session->setFlashdata('error', 'Gagal mengirim pesan. Silakan coba lagi.');
            return redirect()->back()->withInput();
        }
    }
}
