<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\UserModel;
use App\Models\Jenis_objek;
use App\Models\Cagar_budaya;
use App\Models\PengajuanModel;
use App\Models\InformasiModel;

class PetaController extends Controller
{
    public function index($url)
    {
      if ($url == 'cagar_budaya') {
         $data = array(
            'judul' => 'Peta Cagar Budaya',
            'jenis_cb' => Jenis_objek::all(),
            'informasi' => InformasiModel::all(),
            'js' => 'js_peta_cagarbudaya',
         );   
      }else{
         $data = array(
            'judul' => 'Peta Pengajuan Cagar Budaya',
            'jenis_cb' => Jenis_objek::all(),
            'informasi' => InformasiModel::all(),
            'js' => 'js_peta_pengajuan',
         );
      }
      
      return view('portal.konten.peta')->with($data);

    }

    public function getData(Request $request)
    {
      $id = $request->id;
      if ($id == '') {
         $data  = Cagar_budaya::all();
      }else{
         $data  = Cagar_budaya::where('jenis_objek_id','=',$id)->get();
      }

      return Response()->json($data);

    }

    public function getDataPengajuan(Request $request)
    {
      $id = $request->id;
      if ($id == '') {
         $data  = PengajuanModel::where('status','=',1)->get();
      }else{
         $data  = PengajuanModel::where('jenis_objek_id','=',$id)
                  ->where('status','=',1)
                  ->get();
      }

      return Response()->json($data);

    }
    
}
