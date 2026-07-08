<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = $this->db->table('users');

        $existingUser = $model->where('username', 'admin')->get()->getRow();

        if ($existingUser) {
            return;
        }

        $data = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'name' => 'Administrator',
        ];

        $model->insert($data);
    }
}
