<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\UserModel;
use App\Models\Jenis_objek;
use App\Models\Cagar_budaya;
use App\Models\InformasiModel;

class DepanInformasiController extends Controller
{

    public function index()
    {
        $data = array(
            'judul' => 'Informasi',
            'jenis_cb' => Jenis_objek::all(),
            'informasi' => InformasiModel::all(),
            'cagar_budaya' => Cagar_budaya::join('kis_jenisobjek','kis_jenisobjek.id','=','kis_cagarbudaya.jenis_objek_id')
                            ->where('url', $url)
                            ->select('kis_cagarbudaya.*','kis_jenisobjek.jenis_objek','kis_jenisobjek.url')
                            ->get(),
            'js' => ''
        );

        return view('portal.konten.cagar_budaya')->with($data);
    }

    public function detail($url)
    {
        
        $data = array(
            'jenis_cb' => Jenis_objek::all(),
            'informasi' => InformasiModel::all(),
            'js' => ''
        );
        $data['informasi_detail'] = InformasiModel::where('url','=',$url)->first();
        $data['judul'] = $data['informasi_detail']['judul'];


        return view('portal.konten.detail_informasi')->with($data);
    }
    
}
