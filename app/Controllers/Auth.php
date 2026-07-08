<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\User;

class Auth extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST') {

            $username = trim($this->request->getPost('username'));
            $password = $this->request->getPost('password');

            $userModel = new User();
            $user = $userModel->find($username);

            if ($user && $this->verifyPassword($password, $user->password)) {
                $this->session->set([
                    'admin_logged_in' => true,
                    'admin_username' => $user->username,
                    'admin_name' => $user->name,
                ]);

                return redirect()->to('/admin/dashboard');
            }

            $this->session->setFlashdata('error', 'Username atau password salah!');
        }

        return view('admin/login');
    }

    protected function verifyPassword(string $inputPassword, string $storedPassword): bool
    {
        if (password_verify($inputPassword, $storedPassword)) {
            return true;
        }

        return $inputPassword === $storedPassword;
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/admin/login');
    }
}
