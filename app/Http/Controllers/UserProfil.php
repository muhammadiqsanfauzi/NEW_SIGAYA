<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfil extends Controller
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
            'judul' => 'Profil Saya',
            'user'  => Auth::user()->nama,
            'modal' => 'profil.profil-modal',
            'js'    => 'profil.profil-js',
        );
        
        $data['profil'] = UserModel::where(array('id_user' => Auth::user()->id_user))->first();
        $data['kecamatan'] = json_decode(file_get_contents('https://alamat.siakkab.go.id/kecByKab?kode=14.08'), true);
        $data['alamat'] = json_decode(file_get_contents('https://alamat.siakkab.go.id/alamatByKode?kode='.$data['profil']['kode_alamat']), true);
        // var_dump($data['alamat']); die;

        return view('user.konten.profil.profil')->with($data);
    }

    public function store(Request $request)
    {
        $id = $request->id_user;
        $date = date('Y-m-d H:i:s');
        
        //form vaidasi
        $request->validate(
            [
                'nama'              => 'required',
                'nik'               => 'required',
                'kelamin'           => 'required',
                'tpt_lahir'         => 'required',
                'tgl_lahir'         => 'required',

                'kode_alamat'       => 'required',
                'rt'                => 'required',
                'rw'                => 'required',
                'email'             => 'required|email',
                'hp'                => 'required',

                // 'file_foto_lama'    => 'required',
                // 'file_ktp_lama'     => 'required',

                'file_foto'         => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
                'file_ktp'          => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            ],
            [
                'nama.required'             => 'Nama wajib diisi',
                'nik.required'              => 'NIK wajib diisi',
                'kelamin.required'          => 'Kelamin wajib diisi',
                'tpt_lahir.required'        => 'Tempat Lahir wajib diisi',
                'tgl_lahir.required'        => 'Tanggal lahir wajib diisi',

                'kode_alamat.required'      => 'Alamat wajib diisi',
                'rt.required'               => 'RT wajib diisi',
                'rw.required'               => 'RW wajib diisi',
                'email.required'            => 'Email wajib diisi',
                'email.email'               => 'Email valid',
                'hp.required'               => 'No HP wajib diisi',

                'file_foto.image'           => 'Format Foto salah',
                'file_foto.mimes'           => ' Format Foto harus (jpeg, png, jpg, gif, svg)',
                'file_foto.max'             => ' Ukuran Foto Maksimal 2MB',

                'file_ktp.image'            => 'Format Foto salah',
                'file_ktp.mimes'            => ' Format Foto harus (jpeg, png, jpg, gif, svg)',
                'file_ktp.max'              => ' Ukuran Foto Maksimal 2MB',
            ]
        );

        $get  = UserModel::where(array('id_user' => Auth::user()->id_user))->first();

        //Upload Foto
        $upload_foto = $request->file_foto;
        if (isset($upload_foto)) {

            //hapus foto lama dari directory
            $path = storage_path('app/user/' . $get->file_foto);
            if (File::exists($path)) {
                File::delete($path);
            }
            //simpan foto baru
            $name_foto = date('d-m-y H:i:s ') . $request->file_foto->getClientOriginalName();
            $request->file('file_foto')->storeAs('user', $name_foto);
        } else {
            $name_foto = $request->file_foto_lama;
        }

        //Upload KTP
        $upload_ktp = $request->file_ktp;
        if (isset($upload_ktp)) {

            //hapus foto lama dari directory
            $path = storage_path('app/user/' . $get->file_ktp);
            if (File::exists($path)) {
                File::delete($path);
            }
            //simpan foto baru
            $name_ktp = date('d-m-y H:i:s ') . $request->file_ktp->getClientOriginalName();
            $request->file('file_ktp')->storeAs('user', $name_ktp);
        } else {
            $name_ktp = $request->file_ktp_lama;
        }

        $data = array(
            'nama'          => htmlspecialchars($request->nama, true),
            'nik'           => htmlspecialchars($request->nik, true),
            'kelamin'       => htmlspecialchars($request->kelamin, true),
            'tpt_lahir'     => htmlspecialchars($request->tpt_lahir, true),
            'tgl_lahir'     => htmlspecialchars($request->tgl_lahir, true),
            'kode_alamat'   => htmlspecialchars($request->kode_alamat, true),
            'rt'            => htmlspecialchars($request->rt, true),
            'rw'            => htmlspecialchars($request->rw, true),
            'email'         => htmlspecialchars($request->email, true),
            'hp'            => htmlspecialchars($request->hp, true),
            'file_foto'     => $name_foto,
            'file_ktp'      => $name_ktp,
            'diinput_oleh'  => $id,
            'diinput_pada'  => $date,

        );

        $update = UserModel::where('id_user', $id)->update($data);
        return Response()->json($update);
    }

    public function store_password(Request $request)
    {   
        $id = Auth::user()->id_user; 
        $date = date('Y-m-d H:i:s');
        
        //form vaidasi
        $request->validate(
            [
                'email'                         => 'required',
                'password'                      => 'required',
            ],
            [
                'email.required'                => 'email wajib diisi',
                'password.required'             => 'Password Baru wajib diisi',
            ]
        );

        $get  = UserModel::where(array('id_user' => $id))->first();
        if ($get->email == $request->email) {
            $data = array(
                'password'      => Hash::make($request->password),
                'diinput_oleh'  => $id,
                'diinput_pada'  => $date
            );
            $update = UserModel::where('id_user', $id)->update($data);
            return Response()->json($update);
        }else{
            $error = ['status'=> false, 'email'=>'Email Salah'];
            return Response()->json($error);
        }

    }

    public function get_profil()
    {
        $data = UserModel::where(array('id_user' => Auth::user()->id_user))->first();
        return Response()->json($data);
    }

    public function get_kec()
    {
        $data = json_decode(file_get_contents('https://alamat.siakkab.go.id/kecByKab?kode=14.08'), true);
        return Response()->json($data);
    }

    public function get_kampung(Request $request)
    {
        $kode_kec = $request->kode;
        $data = json_decode(file_get_contents('https://alamat.siakkab.go.id/kamByKec?kode='.$kode_kec), true);
        return Response()->json($data);
    }
}
