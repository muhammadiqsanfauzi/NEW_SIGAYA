<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanModel;
use App\Models\FilePengajuanModel;
use App\Models\Jenis_objek;
use Illuminate\Support\Facades\File;



class DaftarPengajuan extends Controller
{
    
    public function index(Request $request)
    {
        $data['kecamatan'] = json_decode(file_get_contents('https://alamat.siakkab.go.id/kecByKab?kode=14.08'), true);
        $data['jenis_objek'] = Jenis_objek::all();

        $dt = PengajuanModel::all();

        if (request()->ajax()) {
            return datatables()->of($dt)

                // ->addColumn('action', $verif. $detail . $hapus)
                ->addColumn('nama_objek', function (PengajuanModel $pengajuan) {
                    $alamat = json_decode(file_get_contents('https://alamat.siakkab.go.id/alamatByKode?kode='.$pengajuan->kode_alamat), true);
                    $jenis_objek = $balas = Jenis_objek::where('id', $pengajuan->id_m_jenisobjek)->first();
                    $col1 = '<div class="row">
                                <div class="col-md-4">Nama Objek</div>
                                <div class="col-sm-8">: <b><a class="text-primary">'.$pengajuan->nama_objek.'</a></b></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Jenis Objek</div>
                                <div class="col-sm-8">: '.$jenis_objek->jenis_objek.'</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Lokasi</div>
                                <div class="col-sm-8">: <a class="text-success">'.$alamat['data'][0]['nama_alamat'].'</a></div>
                            </div>';
                    return $col1;
                })
                ->addColumn('info_lain', function(PengajuanModel $pengajuan){
                    if ($pengajuan->status == 0) {
                        $status = "<b class='text-danger font-italic'>Belum di verifikasi</b>";
                    }else{
                        $status = "<b class='text-success font-italic'>Di verifikasi</b>";
                    }
                    
                    $col2 = '<div class="row">
                                <div class="col-md-5">Keutuhan</div>
                                <div class="col-md-7">: '.$pengajuan->keutuhan_odcb.'</div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 pull-right">Pemeliharan</div>
                                <div class="col-md-7">: '.$pengajuan->pemeliharaan_odcb.'</div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-5">Kepemilikan</div>
                                <div class="col-md-7">: '.$pengajuan->status_kepemilikan.'</div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-5"><b>Status pengajuan</b></div>
                                <div class="col-md-7">: '.$status.'</div>
                            </div>';

                    return $col2;
                })

                ->addColumn('action', function(PengajuanModel $pengajuan){

                    $url = url('detail_pengajuan/'.$pengajuan->id_pengajuan);
                    
                    $detail = '<a href="'.$url.'" data-toggle="tooltip" title="Detail" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i></a> ';
                    $verif = '<a href="javascript:void(0);" id="verifikasi" onClick="verifFunc('.$pengajuan->id_pengajuan.')" title="Verifikasi pengajuan!" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a> ';
                    $hapus = '<a href="javascript:void(0);" id="delete-compnay" onClick="deleteFunc('.$pengajuan->id_pengajuan.')" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

                    if ($pengajuan->status == 0) {
                        $aksi = $verif.$detail.$hapus;
                    }else{
                        $aksi = $detail.$hapus;
                    }

                    return $aksi;
                })

                ->rawColumns(['action', 'nama_objek','info_lain'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('daftar_pengajuan.v_daftar_pengajuan')->with($data);
    }

    public function detail($id, Request $request)
    {
        $data = array(
            'kecamatan' => json_decode(file_get_contents('https://alamat.siakkab.go.id/kecByKab?kode=14.08'), true),
            'file'      => FilePengajuanModel::where(array('id_pengajuan' => $id))->get(),
        );
        $data['detail'] = PengajuanModel::join('kis_jenisobjek', 'kis_jenisobjek.id', '=', 'kis_pengajuans.id_m_jenisobjek')
                        ->join('kis_users', 'kis_users.id_user', '=', 'kis_pengajuans.diinput_oleh')
                        ->where(array('id_pengajuan' => $id))
                        ->first();

        $data['alamat'] = json_decode(file_get_contents('https://alamat.siakkab.go.id/alamatByKode?kode='.$data['detail']['kode_alamat']), true);

        return view('daftar_pengajuan.v_detail_pengajuan')->with($data);
    }

    public function verifikasi(Request $request)
    {
        $id = $request->id;

        $data = array(

            "status"                => '1',
        );

        $query = PengajuanModel::where('id_pengajuan', $id)->update($data);
        return Response()->json($query);
    }

    public function delete(Request $request)
    {
        
        // delete file
        $where = array('id_pengajuan' => $request->id);
        $files  = FilePengajuanModel::where($where)->get();

        foreach ($files as $value) {
            $path = public_path('image/cagar_budaya/' . $value->file_pengajuan);
            if (File::exists($path)) {
                File::delete($path);
            }   
        }

        //delete data dari db
        $data = PengajuanModel::where('id_pengajuan', $request->id)->delete();
        $file = FilePengajuanModel::where('id_pengajuan', $request->id)->delete();
        return Response()->json($data);
    }
}
