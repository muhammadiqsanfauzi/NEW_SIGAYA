<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\UserModel;
use App\Models\Jenis_objek;
use App\Models\InformasiModel;
use App\Models\Cagar_budaya;
use App\Models\PengajuanModel;

class DepanController extends Controller
{
    public function index()
    {
        $data = array(
            'judul' => 'Home',
            'jenis_cb' => Jenis_objek::all(),
            'informasi' => InformasiModel::all(),
            'js' => '',
            'cagar_budaya' => Cagar_budaya::join('kis_jenisobjek','kis_jenisobjek.id','=','kis_cagarbudaya.jenis_objek_id')
                        ->limit(5)
                        ->select('kis_cagarbudaya.*','kis_jenisobjek.jenis_objek')
                        ->get(),
        );

        return view('portal.konten.beranda')->with($data);
    }
    
}
