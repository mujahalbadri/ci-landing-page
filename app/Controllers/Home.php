<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $users = new UserModel();
        $dataUser = $users->where([
            'email' => session()->get('email'),
        ])->first();

        return view('home', [
            'user' => $dataUser
        ]);
    }
}