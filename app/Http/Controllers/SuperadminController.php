<?php

namespace App\Http\Controllers;

use App\Models\Jenis_objek;
use App\Models\Cagar_budaya;

use Illuminate\Http\Request;
use Auth;

class AdminkantorController extends Controller
{
    public function index()
    {

     $jenis_objek = Jenis_objek::all();
     $cagar_budaya = Cagar_budaya::all();

       return view('dashboard_mif',compact('jenis_objek','cagar_budaya'));
    }

}
