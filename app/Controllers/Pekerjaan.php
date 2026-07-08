<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PekerjaanModel;

class Pekerjaan extends Controller
{
    protected $pekerjaanModel;
    protected $session;

    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
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
            'page_title' => 'Management Pekerjaan',
            'pekerjaan'  => $this->pekerjaanModel->findAll(),
        ];

        return view('admin/pekerjaan/index', $data);
    }

    public function add()
    {
        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'periode'    => 'required|max_length[50]',
                'posisi'     => 'required|max_length[150]',
                'perusahaan' => 'required|max_length[150]',
            ];

            if (!$this->validate($rules)) {
                return view('admin/pekerjaan/form', [
                    'page_title' => 'Management Pekerjaan',
                    'id'         => 0,
                    'action'     => 'add',
                    'validation' => $this->validator,
                ]);
            }

            $this->pekerjaanModel->save([
                'periode'    => $this->request->getPost('periode'),
                'posisi'     => $this->request->getPost('posisi'),
                'perusahaan' => $this->request->getPost('perusahaan'),
            ]);

            $this->session->setFlashdata('success', 'Pekerjaan berhasil ditambahkan!');

            return redirect()->to('/admin/pekerjaan');
        }

        return view('admin/pekerjaan/form', [
            'page_title' => 'Management Pekerjaan',
            'id'         => 0,
            'action'     => 'add',
        ]);
    }

    public function edit($id)
    {
        $pekerjaan = $this->pekerjaanModel->find($id);

        if (!$pekerjaan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'periode'    => 'required|max_length[50]',
                'posisi'     => 'required|max_length[150]',
                'perusahaan' => 'required|max_length[150]',
            ];

            if (!$this->validate($rules)) {
                return view('admin/pekerjaan/form', [
                    'page_title' => 'Management Pekerjaan',
                    'pekerjaan'  => $pekerjaan,
                    'id'         => $id,
                    'action'     => 'edit',
                    'validation' => $this->validator,
                ]);
            }

            $this->pekerjaanModel->update($id, [
                'periode'    => $this->request->getPost('periode'),
                'posisi'     => $this->request->getPost('posisi'),
                'perusahaan' => $this->request->getPost('perusahaan'),
            ]);

            $this->session->setFlashdata('success', 'Pekerjaan berhasil diperbarui!');

            return redirect()->to('/admin/pekerjaan');
        }

        return view('admin/pekerjaan/form', [
            'page_title' => 'Management Pekerjaan',
            'pekerjaan'  => $pekerjaan,
            'id'         => $id,
            'action'     => 'edit',
        ]);
    }

    public function delete($id)
    {
        $pekerjaan = $this->pekerjaanModel->find($id);

        if (!$pekerjaan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $this->pekerjaanModel->delete($id);

        $this->session->setFlashdata('success', 'Pekerjaan berhasil dihapus!');

        return redirect()->to('/admin/pekerjaan');
    }
}