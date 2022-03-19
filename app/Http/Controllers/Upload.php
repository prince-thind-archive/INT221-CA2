<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Upload extends Controller
{
    public function upload(Request $req)
    {
        $file = $req->file('file1');

        $destinationPath = 'uploads';
        $name = $file->getClientOriginalName();

        $file->storeAs($destinationPath,$name);
        
        return redirect('profile');
    }
}
