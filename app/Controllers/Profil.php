<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    protected $profilModel;
    protected $session;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->session = session();

        if (!$this->session->get('admin_logged_in')) {
            redirect()->to('/admin/login')->send();
            exit;
        }
    }

    public function index()
    {
        $data = [
            'page_title' => 'Management Profil',
            'profil'     => $this->profilModel->first(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/profil/index', $data);
    }

    public function update()
    {
        $profil = $this->profilModel->first();

        $rules = [
            'nama'              => 'required|min_length[3]|max_length[100]',
            'email'             => 'permit_empty|valid_email',
            'telepon'           => 'permit_empty|max_length[20]',
            'foto'              => 'permit_empty|is_image[foto]|max_size[foto,5120]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]',
        ];

        if (!$this->validate($rules)) {
            return view('admin/profil/index', [
                'page_title' => 'Management Profil',
                'profil'     => $profil,
                'validation' => $this->validator, 
            ]);
        }

        // Foto lama
        $foto = $this->request->getPost('foto_lama');

        // Upload foto baru
        $file = $this->request->getFile('foto');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();

            $file->move(FCPATH . 'assets/img', $newName);

            $foto = 'assets/img/' . $newName;

            if (
                !empty($this->request->getPost('foto_lama')) &&
                $this->request->getPost('foto_lama') != 'assets/img/foto.jpg'
            ) {
                $old = FCPATH . $this->request->getPost('foto_lama');

                if (file_exists($old)) {
                    unlink($old);
                }
            }
        }

        $this->profilModel->update($profil['id'], [
            'nama'                => $this->request->getPost('nama'),
            'tempat_lahir'        => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
            'email'               => $this->request->getPost('email'),
            'telepon'             => $this->request->getPost('telepon'),
            'alamat'              => $this->request->getPost('alamat'),
            'foto'                => $foto,
            'deskripsi_tentang'   => $this->request->getPost('deskripsi_tentang'),
        ]);

        $this->session->setFlashdata('success', 'Profil berhasil diperbarui!');

        return redirect()->to('/admin/profil');
    }
}