<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PendidikanModel;

class Pendidikan extends Controller
{
    protected $pendidikanModel;
    protected $session;

    public function __construct()
    {
        $this->pendidikanModel = new PendidikanModel();
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
            'page_title' => 'Management Pendidikan',
            'pendidikan' => $this->pendidikanModel->findAll(),
        ];

        return view('admin/pendidikan/index', $data);
    }

    public function add()
    {
        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'periode'   => 'required|max_length[50]',
                'institusi' => 'required|max_length[150]',
                'program'   => 'required|max_length[150]',
            ];

            if (!$this->validate($rules)) {
                return view('admin/pendidikan/form', [
                    'page_title' => 'Management Pendidikan',
                    'id'         => 0,
                    'action'     => 'add',
                    'validation' => $this->validator,
                ]);
            }

            $this->pendidikanModel->save([
                'periode'   => $this->request->getPost('periode'),
                'institusi' => $this->request->getPost('institusi'),
                'program'   => $this->request->getPost('program'),
            ]);

            $this->session->setFlashdata('success', 'Pendidikan berhasil ditambahkan!');

            return redirect()->to('/admin/pendidikan');
        }

        return view('admin/pendidikan/form', [
            'page_title' => 'Management Pendidikan',
            'id'         => 0,
            'action'     => 'add',
        ]);
    }

    public function edit($id)
    {
        $pendidikan = $this->pendidikanModel->find($id);

        if (!$pendidikan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'periode'   => 'required|max_length[50]',
                'institusi' => 'required|max_length[150]',
                'program'   => 'required|max_length[150]',
            ];

            if (!$this->validate($rules)) {
                return view('admin/pendidikan/form', [
                    'page_title' => 'Management Pendidikan',
                    'pendidikan' => $pendidikan,
                    'id'         => $id,
                    'action'     => 'edit',
                    'validation' => $this->validator,
                ]);
            }

            $this->pendidikanModel->update($id, [
                'periode'   => $this->request->getPost('periode'),
                'institusi' => $this->request->getPost('institusi'),
                'program'   => $this->request->getPost('program'),
            ]);

            $this->session->setFlashdata('success', 'Pendidikan berhasil diperbarui!');

            return redirect()->to('/admin/pendidikan');
        }

        return view('admin/pendidikan/form', [
            'page_title' => 'Management Pendidikan',
            'pendidikan' => $pendidikan,
            'id'         => $id,
            'action'     => 'edit',
        ]);
    }

    public function delete($id)
    {
        $pendidikan = $this->pendidikanModel->find($id);

        if (!$pendidikan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $this->pendidikanModel->delete($id);

        $this->session->setFlashdata('success', 'Pendidikan berhasil dihapus!');

        return redirect()->to('/admin/pendidikan');
    }
}