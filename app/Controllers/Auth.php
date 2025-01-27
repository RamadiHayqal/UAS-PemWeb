<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        return redirect()->to('login');
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->userModel->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                $sessionData = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                ];

                session()->set($sessionData);
                return redirect()->to('dashboard');
            }

            return redirect()->back()->with('error', 'Email atau password salah');
        }

        return view('auth/login', [
            'title' => 'Login - Sistem Klinik'
        ]);
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required|min_length[3]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
                'role' => 'required|in_list[admin,dokter,staff]'
            ];

            if ($this->validate($rules)) {
                $data = [
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'role' => $this->request->getPost('role')
                ];

                $this->userModel->save($data);
                return redirect()->to('login')->with('success', 'Registrasi berhasil! Silakan login.');
            }
        }

        return view('auth/register', [
            'title' => 'Register - Sistem Klinik',
            'validation' => $this->validator
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
