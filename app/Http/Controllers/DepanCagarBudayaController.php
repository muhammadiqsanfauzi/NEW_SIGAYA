<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\UserModel;
use App\Models\Jenis_objek;
use App\Models\Cagar_budaya;
use App\Models\InformasiModel;

class DepanCagarBudayaController extends Controller
{

    public function kategori($url)
    {
        $jenis = Jenis_objek::where('url','=',$url)->first();
        
        $data = array(
            'judul' => $jenis->jenis_objek,
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
            'cagar_budaya' => Cagar_budaya::join('kis_jenisobjek','kis_jenisobjek.id','=','kis_cagarbudaya.jenis_objek_id')
                            ->where('url_objek', $url)
                            ->select('kis_cagarbudaya.*','kis_jenisobjek.jenis_objek','kis_jenisobjek.url')
                            ->first(),
            'js' => ''
        );
        $data['judul'] = $data['cagar_budaya']['nama_objek'];

        return view('portal.konten.detail_cagar_budaya')->with($data);
    }
    
}
