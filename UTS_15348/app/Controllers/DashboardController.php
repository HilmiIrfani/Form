<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'username' => session('username'),
            'role' => session('role'),  
        ];

        if ($data['role'] == 'admin') {
            $data['title'] = 'AuRevoir Admin Dashboard';
            return view('dashboard/admin', $data);
        } elseif ($data['role'] == 'user') {
            $data['title'] = 'Aurevoir Dashboard';
            return view('dashboard/user', $data, ['title = > User Dashboard']);
        } else {
            return redirect()->to('/');
        }
    }
}
