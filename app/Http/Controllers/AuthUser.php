<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use App\Models\RootModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use Illuminate\Auth\Events\Validated;

class AuthUser extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            //Login Success
            return redirect('u-beranda');
        }
        return view('user.login');
    }

    public function login(Request $request)
    {
        //form vaidasi
        $request->validate(
            [
                'email'        => 'required',
                'password'     => 'required',
                'g-recaptcha-response' => 'recaptcha',
            ],
            [
                'email.required'                    => 'Email wajib diisi',
                'password.required'                 => 'Password wajib diisi',
                'g-recaptcha-response.recaptcha'    => 'Captcha harus dicentang',
            ]
        );

        $data = [
            'email'         => $request->input('email'),
            'password'      => $request->input('password'),

        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('u-beranda');
        } else { 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('u-login');
        }
    }

    public function showFormRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:kis_users,email',
            'user'                  => 'required',
            'password'              => 'required',
            'password2'             => 'required',
        ],
        [
            'nama.required'         => 'Nama Lengkap wajib diisi',
            'nama.min'              => 'Nama lengkap minimal 3 karakter',
            'nama.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',

            'user.required'         => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password2.required'    => 'Konfirmasi password wajib diisi',
        ]);

        $user = new UserModel();
        $user->nama = $request->nama;
        $user->email = strtolower($request->email);
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->diinput_oleh = 99;
        $user->diinput_pada = date('Y-m-d H:i:s');
        $simpan = $user->save();

        return Response()->json($simpan);
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('/');
    }
}
