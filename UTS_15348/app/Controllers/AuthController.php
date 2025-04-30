<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    private $users = [
        'Mail' => [
            'username' => 'Mail',
            'password' => '',
            'role' => 'admin'
        ],
        'Mei-Mei' => [
            'username' => 'Mei-Mei',
            'password' => '',
            'role' => 'user'
        ]
    ];

    public function __construct()
    {
        $this->users['Mail']['password'] = password_hash('admin123', PASSWORD_DEFAULT);
        $this->users['Mei-Mei']['password'] = password_hash('user123', PASSWORD_DEFAULT);
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        foreach ($this->users as $user) {
            if ($user['username'] == $username && password_verify($password, $user['password'])) {
                session()->set([
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to('/dashboard');
            }
        }

        return redirect()->back()->with('error', 'Login gagal! Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
