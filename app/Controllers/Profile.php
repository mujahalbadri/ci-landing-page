<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/'));
        }

        $users = new UserModel();
        $dataUser = $users->where([
            'email' => session()->get('email'),
        ])->first();

        return view('profile', [
            'user' => $dataUser
        ]);
    }

    public function update()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]'
            ],
            'profile_picture' => [
                'rules' => 'uploaded[profile_picture]|mime_in[profile_picture,image/jpg,image/jpeg,image/png,image/webp]|max_size[profile_picture,2048]'
            ]
        ]);

        $email = session()->get('email');
        $name = $this->request->getVar('name');
        $users = new UserModel();

        if (!$input) {
            $data = $users->where([
                'email' => session()->get('email'),
            ])->first();
            return view('profile', [
                'validation' => $this->validator,
                'user' => $data
            ]);
        } else {
            $data['user'] = $users->where([
                'email' => session()->get('email'),
            ])->first();
            $old_image = $data['user']->profile_picture;
            @unlink('../public/uploads/profile_picture/' . $old_image);

            $dataImage = $this->request->getFile('profile_picture');
            $new_image = $dataImage->getRandomName();

            $users = new UserModel();
            $users->set('name', $name);
            $users->set('profile_picture', $new_image);
            $users->where('email', $email);
            $users->update();


            $dataImage->move('../public/uploads/profile_picture/', $new_image);
            session()->setFlashdata('success', 'Success Update Account');
            return redirect()->back();
        }
    }

    public function changepassword()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
            ],
            'new-password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
            ],
            'password-confirm' => [
                'rules' => 'matches[new-password]',
                'errors' => [
                    'matches' => 'The confirm password does not match the password field.'
                ]
            ],
        ]);

        $users = new UserModel();
        $old_password = $this->request->getVar('password');
        $email = session()->get('email');
        $new_password = password_hash($this->request->getVar('new-password'), PASSWORD_BCRYPT);
        $dataUser = $users->where([
            'email' => $email,
        ])->first();

        if (!$input) {
            return view('profile', [
                'validation' => $this->validator,
                'user' => $dataUser
            ]);
        } else {
            if (password_verify($old_password, $dataUser->password)) {
                $users = new UserModel();
                $users->set('password', $new_password);
                $users->where('email', $email);
                $users->update();

                session()->setFlashdata('success', 'New Password has been changed!');
                return redirect()->back();
            } else {
                session()->setFlashdata('message', 'Current Password is Wrong');
                return redirect()->back();
            }
        }
    }
}