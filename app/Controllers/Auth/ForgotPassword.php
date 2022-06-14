<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserTokenModel;

class ForgotPassword extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/'));
        }

        return view('auth/forgot-password');
    }

    public function process()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'email' => [
                'rules' => 'required',
            ],
        ]);

        $users = new UserModel();
        $email = $this->request->getVar('email');

        if (!$input) {
            return view('auth/forgot-password', [
                'validation' => $this->validator
            ]);
        } else {
            $dataUser = $users->where([
                'email' => $email,
            ])->first();

            if ($dataUser) {
                $token = base64_encode(random_bytes(32));
                $user_tokens = new UserTokenModel();
                $user_tokens->insert([
                    'email' => $email,
                    'token' => $token,
                ]);
                $this->_sendEmail($token);
                session()->setFlashdata('success', 'Please check your email to reset your password.');
                return redirect()->to('forgot-password');
            } else {
                session()->setFlashdata('message', 'Email is not registered!');
                return redirect()->to('forgot-password');
            }
        }
    }

    private function _sendEmail($token)
    {
        $email = \Config\Services::email();
        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.zoho.com',
            'SMTPUser' => 'kaito148@zohomail.com',
            'SMTPPass' => 'y6FsYz6bDDKy',
            'SMTPPort' => 587,
            'SMTPCrypto' => 'tls',
            'mailType' => 'html',
            'charset' => 'utf-8',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ];

        $email->initialize($config);
        $email->setFrom('kaito148@zohomail.com', 'Reset Password');
        $email->setTo($this->request->getVar('email'));
        $email->setSubject('Reset Password');
        $email->setMessage('Click this link to reset your password : <a href="' . base_url() . '/forgot-password/reset-password?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

        if ($email->send()) {
            return true;
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }


    public function resetpassword()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $users = new UserModel();
        $dataUser = $users->where([
            'email' => $email,
        ])->first();

        if ($dataUser) {
            $user_tokens = new UserTokenModel();
            $dataUserToken = $user_tokens->where([
                'token' => $token,
            ])->first();
            if ($dataUserToken) {
                session()->set('reset_email', $email);
                return redirect()->to('/forgot-password/change-password');
            } else {
                session()->setFlashdata('message', 'Reset Password failed! Wrong token.');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('message', '
            Reset Password failed! Wrong email.');
            return redirect()->to('login');
        }
    }

    public function changepassword()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/'));
        }

        if (!session()->get('reset_email')) {
            return redirect()->to(base_url('/login'));
        }

        return view('auth/change-password');
    }

    public function changeprocess()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
            ],
            'password-confirm' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'The confirm password does not match the password field.'
                ]
            ],
        ]);

        $email = session()->get('reset_email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

        if (!$input) {
            return view('auth/change-password', [
                'validation' => $this->validator
            ]);
        } else {
            $users = new UserModel();
            $users->set('password', $password);
            $users->where('email', $email);
            $users->update();

            $user_tokens = new UserTokenModel();
            $user_tokens->where('email', $email);
            $user_tokens->delete();

            session()->remove('reset_email');
            session()->setFlashdata('success', 'New Password has been changed!');
            return redirect()->to('login');
        }
    }
}