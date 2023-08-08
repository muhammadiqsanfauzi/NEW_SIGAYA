<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\UserModel;

class UserBeranda extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect('u-login');
        }
    }

    public function index()
    {
        $data = array(
            'judul' => 'Beranda',
            'user'  => Auth::user()->nama,
            'js'    => '',
            'profil'=> UserModel::where(array('id_user' => Auth::user()->id_user))->first(),
        );

        return view('user.konten.beranda')->with($data);
    }
    
}
