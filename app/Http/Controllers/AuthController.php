<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Http;
use \App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Hash;


class AuthController extends Controller

{
    public function Proses_login(Request $request)
    {   
        // Login Aplikasi SIMAK / API SIMAK
        // dd ($request->all());
        $response = Http::withBasicAuth('siaksriindrapura', '514Kr!!NdR4PU124')->withHeaders([
            'SIAK-KEY' => 'NjE2ZTdkNWNjNmVjZTIuODUzODIxODE=SIAKSRIINDRAPURA'])
            ->asForm()->post('103.51.44.173/api/authv2',
            [   
                'username' => $request->username,
                'password' => $request->password,
                'host'     => 'sicabud.siakkab.go.id'
            ]);
        // dd($response['data']);

            if($response){
                session([
                    'auth'=>true,
                    'id_admin'=>$response['data']['id_pegawai'],
                    'nama'=>$response['data']['nama_pegawai'],
                    'level'=>$response['data']['tingkatan_level'],
                ]);
            
                if($response['data']['tingkatan_level']==1){
                    $url='superadmin';
                }elseif($response['data']['tingkatan_level']==2){
                    $url='adminkantor';
                }elseif($response['data']['tingkatan_level']==3){
                    $url='operator';
                }else{
                    $url='tanjak';
                }
            }
            

            return redirect($url);

            //Jika Loginnya Berhasil :
                        // if (Auth::attempt(['username' => $response['data']['id_pegawai'], 'password' => $response['data']['id_pegawai']])) {
                        //     $user = Auth::user();
                        //     // dd(auth::user());
                        //     if ($user->level_id ==1) {                  //Maka akan pindah kehalaman Superadmin
                        //         return redirect()->intended('superadmin');
                        //     } elseif ($user->level_id ==2) {                  //dan jika level koordinatorusers maka akan pindah kehalaman adminteknis
                        //         return redirect()->intended('adminkantor');
                        //     } elseif ($user->level_id ==3) {                  //dan jika level admin maka akan pindah kehalaman admindinas
                        //         return redirect()->intended('operator');
                        //     }
                        //    return redirect()->intended('/');                   //jika tidak keduanya maka akan pindah ke halaman root
                        // }


            ;  
    }


    public function logout (Request $request) 
    {
         Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
