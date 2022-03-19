<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function login(Request $req)
    {
        $data = $req->input();
        $req->session()->put('user', $data['user']);
        return redirect('profile');
    }
}
