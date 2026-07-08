<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfilModel;
use App\Models\SkillsModel;
use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\ProjectsModel;
use App\Models\MessagesModel;

class Home extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilModel();
        $skillsModel = new SkillsModel();
        $pendidikanModel = new PendidikanModel();
        $pekerjaanModel = new PekerjaanModel();
        $projectsModel = new ProjectsModel();
        $messagesModel = new MessagesModel();
        

        $data = [
            'session' => session(),
            'profil' => $profilModel->first(),
            'skills' => $skillsModel->findAll(),
            'pendidikan' => $pendidikanModel->findAll(),
            'pekerjaan' => $pekerjaanModel->findAll(),
            'projects' => $projectsModel->getActive(),
            'hero_description' => 'Full-Stack Developer yang passionate tentang membangun web applications dengan teknologi terkini, clean code, dan user experience yang optimal.',
        ];

        return view('home', $data);
    }

    function sendMessages()
    {
        $messagesModel = new MessagesModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'subjek' => $this->request->getPost('subjek'),
            'pesan' => $this->request->getPost('pesan'),
            'status' => 'baru',
        ];

        $messagesModel->insert($data);

        return redirect()->to('/#contact')->with('success', 'Pesan berhasil dikirim!');
    }
}
