<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfilModel;
use App\Models\SkillsModel;
use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\ProjectsModel;
use App\Models\MessagesModel;

class Dashboard extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
        $this->checkAuth();
    }

    private function checkAuth()
    {
        if (!$this->session->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
    }

    public function index()
    {
        $this->checkAuth();
        
        $profilModel = new ProfilModel();
        $skillsModel = new SkillsModel();
        $pendidikanModel = new PendidikanModel();
        $pekerjaanModel = new PekerjaanModel();
        $projectsModel = new ProjectsModel();
        $messagesModel = new MessagesModel();

        $data = [
            'page_title' => 'Dashboard',
            'admin_username' => $this->session->get('admin_username'),
            'profil_count' => $profilModel->countAll(),
            'skills_count' => $skillsModel->countAll(),
            'pendidikan_count' => $pendidikanModel->countAll(),
            'pekerjaan_count' => $pekerjaanModel->countAll(),
            'projects_count' => $projectsModel->countAll(),
            'messages_count' => $messagesModel->countAll(),
            'new_messages' => $messagesModel->countNew(),
        ];

        return view('admin/dashboard', $data);
    }
}
