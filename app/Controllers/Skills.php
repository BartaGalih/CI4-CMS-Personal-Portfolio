<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SkillsModel;

class Skills extends Controller
{
    protected $skillsModel;
    protected $session;

    public function __construct()
    {
        $this->skillsModel = new SkillsModel();
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
            'page_title' => 'Management Skills',
            'skills'     => $this->skillsModel->findAll(),
        ];

        return view('admin/skills/index', $data);
    }

    public function add()
    {
        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'nama_skill' => 'required|min_length[3]|max_length[100]',
                'level'      => 'required|max_length[50]',
                'tahun'      => 'permit_empty|integer',
            ];

            if (!$this->validate($rules)) {
                dd($this->validator->getErrors());
                return view('admin/skills/form', [
                    'page_title' => 'Management Skills',
                    'id'         => 0,
                    'action'     => 'add',
                    'validation' => $this->validator,
                ]);
            }

            $this->skillsModel->save([
                'nama_skill' => $this->request->getPost('nama_skill'),
                'level'      => $this->request->getPost('level'),
                'tahun'      => $this->request->getPost('tahun'),
            ]);

            $this->session->setFlashdata('success', 'Skill berhasil ditambahkan!');
            return redirect()->to('/admin/skills');
        }

        return view('admin/skills/form', [
            'page_title' => 'Management Skills',
            'id'         => 0,
            'action'     => 'add',
        ]);
    }

    public function edit($id)
    {
        $skill = $this->skillsModel->find($id);

        if (!$skill) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Skill tidak ditemukan');
        }

        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'nama_skill' => 'required|min_length[3]|max_length[100]',
                'level'      => 'required|max_length[50]',
                'tahun'      => 'permit_empty|integer',
            ];

            if (!$this->validate($rules)) {
                return view('admin/skills/form', [
                    'page_title' => 'Management Skills',
                    'skill'      => $skill,
                    'id'         => $id,
                    'action'     => 'edit',
                    'validation' => $this->validator,
                ]);
            }

            $this->skillsModel->update($id, [
                'nama_skill' => $this->request->getPost('nama_skill'),
                'level'      => $this->request->getPost('level'),
                'tahun'      => $this->request->getPost('tahun'),
            ]);

            $this->session->setFlashdata('success', 'Skill berhasil diperbarui!');
            return redirect()->to('/admin/skills');
        }

        return view('admin/skills/form', [
            'page_title' => 'Management Skills',
            'skill'      => $skill,
            'id'         => $id,
            'action'     => 'edit',
        ]);
    }

    public function delete($id)
    {
        $skill = $this->skillsModel->find($id);

        if (!$skill) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Skill tidak ditemukan');
        }

        $this->skillsModel->delete($id);

        $this->session->setFlashdata('success', 'Skill berhasil dihapus!');

        return redirect()->to('/admin/skills');
    }
}