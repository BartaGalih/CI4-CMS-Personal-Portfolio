<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProjectsModel;

class Projects extends Controller
{
    protected $projectsModel;
    protected $session;

    public function __construct()
    {
        $this->projectsModel = new ProjectsModel();
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
            'page_title' => 'Management Projects',
            'projects'   => $this->projectsModel->findAll(),
        ];

        return view('admin/projects/index', $data);
    }

    public function add()
    {
        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'nama_project' => 'required|min_length[3]|max_length[150]',
                'deskripsi'    => 'required',
                'teknologi'    => 'required|max_length[255]',
                'link_github'  => 'permit_empty|valid_url_strict',
                'link_demo'    => 'permit_empty|valid_url_strict',
                'status'       => 'required|in_list[aktif,archived]',
                'gambar'       => 'permit_empty|is_image[gambar]|max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
            ];

            if (!$this->validate($rules)) {
                return view('admin/projects/form', [
                    'page_title' => 'Management Projects',
                    'action'     => 'add',
                    'id'         => 0,
                    'validation' => $this->validator,
                ]);
            }

            $gambar = '';

            $file = $this->request->getFile('gambar');

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $gambar = $file->getRandomName();
                $file->move(FCPATH . 'uploads/projects', $gambar);
            }

            $this->projectsModel->save([
                'nama_project' => $this->request->getPost('nama_project'),
                'deskripsi'    => $this->request->getPost('deskripsi'),
                'teknologi'    => $this->request->getPost('teknologi'),
                'link_github'  => $this->request->getPost('link_github'),
                'link_demo'    => $this->request->getPost('link_demo'),
                'gambar'       => $gambar,
                'status'       => $this->request->getPost('status'),
            ]);

            $this->session->setFlashdata('success', 'Project berhasil ditambahkan!');

            return redirect()->to('/admin/projects');
        }

        return view('admin/projects/form', [
            'page_title' => 'Management Projects',
            'action'     => 'add',
            'id'         => 0,
        ]);
    }

    public function edit($id)
    {
        $project = $this->projectsModel->find($id);

        if (!$project) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Project tidak ditemukan');
        }

        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'nama_project' => 'required|min_length[3]|max_length[150]',
                'deskripsi'    => 'required',
                'teknologi'    => 'required|max_length[255]',
                'link_github'  => 'permit_empty|valid_url_strict',
                'link_demo'    => 'permit_empty|valid_url_strict',
                'status'       => 'required|in_list[aktif,archived]',
                'gambar'       => 'permit_empty|is_image[gambar]|max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
            ];

            if (!$this->validate($rules)) {
                return view('admin/projects/form', [
                    'page_title' => 'Management Projects',
                    'project'    => $project,
                    'action'     => 'edit',
                    'id'         => $id,
                    'validation' => $this->validator,
                ]);
            }

            $gambar = $project['gambar'];

            $file = $this->request->getFile('gambar');

            if ($file && $file->isValid() && !$file->hasMoved()) {

                $gambar = $file->getRandomName();
                $file->move(FCPATH . 'uploads/projects', $gambar);

                if (!empty($project['gambar'])) {
                    $oldFile = FCPATH . 'uploads/projects/' . $project['gambar'];

                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }
            } else {
                $gambar = $this->request->getPost('gambar_lama');
            }

            $this->projectsModel->update($id, [
                'nama_project' => $this->request->getPost('nama_project'),
                'deskripsi'    => $this->request->getPost('deskripsi'),
                'teknologi'    => $this->request->getPost('teknologi'),
                'link_github'  => $this->request->getPost('link_github'),
                'link_demo'    => $this->request->getPost('link_demo'),
                'gambar'       => $gambar,
                'status'       => $this->request->getPost('status'),
            ]);

            $this->session->setFlashdata('success', 'Project berhasil diperbarui!');

            return redirect()->to('/admin/projects');
        }

        return view('admin/projects/form', [
            'page_title' => 'Management Projects',
            'project'    => $project,
            'action'     => 'edit',
            'id'         => $id,
        ]);
    }

    public function delete($id)
    {
        $project = $this->projectsModel->find($id);

        if (!$project) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Project tidak ditemukan');
        }

        if (!empty($project['gambar'])) {

            $oldFile = FCPATH . 'uploads/projects/' . $project['gambar'];

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $this->projectsModel->delete($id);

        $this->session->setFlashdata('success', 'Project berhasil dihapus!');

        return redirect()->to('/admin/projects');
    }
}