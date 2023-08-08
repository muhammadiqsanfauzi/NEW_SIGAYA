<?php

namespace App\Http\Controllers;

use App\Models\Jenis_objek;
use App\Models\Cagar_budaya;
use App\Models\PengajuanModel;
use App\Models\UserModel;


use Illuminate\Http\Request;
use Auth;

class AdminkantorController extends Controller
{
    public function index()
    {

     $jenis_objek = Jenis_objek::all();
     $cagar_budaya = Cagar_budaya::all();
     $daftar_pengajuan = PengajuanModel::all();
     $daftar_user = UserModel::all();

       return view('dashboard_mif',compact('jenis_objek','cagar_budaya','daftar_pengajuan','daftar_user'));
    }

}
