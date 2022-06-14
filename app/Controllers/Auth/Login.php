<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/'));
        }

        return view('auth/login');
    }

    public function process()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'email' => [
                'rules' => 'required',
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
            ],
        ]);

        $users = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if (!$input) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        } else {
            $dataUser = $users->where([
                'email' => $email,
            ])->first();
            if ($dataUser) {
                if (password_verify($password, $dataUser->password)) {
                    session()->set([
                        'email' => $dataUser->email,
                        'name' => $dataUser->name,
                        'profile_picture' => $dataUser->profile_picture,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('/'));
                } else {
                    session()->setFlashdata('message', 'Wrong Password');
                    return redirect()->to('login');
                }
            } else {
                session()->setFlashdata('message', 'Email is not registered');
                return redirect()->to('login');
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}