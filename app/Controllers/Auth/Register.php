<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/'));
        }

        return view('auth/register');
    }

    public function process()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'name' => ['required|min_length[3]'],
            'email' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.email]',
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
            ],
            'password-confirm' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'The confirm password does not match the password field.'
                ]
            ],
            'profile_picture' => [
                'rules' => 'uploaded[profile_picture]|mime_in[profile_picture,image/jpg,image/jpeg,image/png,image/webp]|max_size[profile_picture,2048]'
            ]
        ]);

        $users = new UserModel();

        if (!$input) {
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        } else {
            $dataImage = $this->request->getFile('profile_picture');
            $fileName = $dataImage->getRandomName();
            $users->insert([
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'name' => $this->request->getVar('name'),
                'profile_picture' => $fileName
            ]);
            $dataImage->move('../public/uploads/profile_picture/', $fileName);
            session()->setFlashdata('success', 'Success Register Account');
            return redirect()->to('login');
        }
    }
}