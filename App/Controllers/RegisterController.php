<?php

namespace App\Controllers;

use App\Models\User;
use Src\Validation\Validator;

class RegisterController
{
    public function index()
    {
        return view("auth.register");
    }

    public function store()
    {
        $v = new Validator();
        $v->setrules([
            'name' => 'required|alnum|between:8,32',
            'username' => 'required|alnum|between:8,32|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|alnum|between:8,32|confirmed',
            'password_confirmation' => 'required|alnum|between:8,32'
        ]);
        $v->setAliases(['password_confirmation' => 'Password confirmation']);
        $v->make(request()->all());
        if (!$v->passes()) {
            app()->session->setFlash('errors', $v->errors());
            app()->session->setFlash('old', request()->all());

            return back();
        }
        User::create([
            'username' => request('username'),
            'name' => request('name'),
            'email' => request('email'),
            'password' => bycrypt(request('password'))
        ]);
        app()->session->setFlash('success', 'Registered sucessfully :D');

        return back();
    }
}
