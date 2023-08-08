<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanModel;
use App\Models\FilePengajuanModel;
use App\Models\Jenis_objek;
use Illuminate\Support\Facades\File;


class UserPengajuan extends Controller
{

    public function __construct()
    {
        if (!Auth::attempt()) {
            redirect('u-login');
        }
    }
    
    public function index()
    {
        $data = array(
            'judul' => 'Pengajuan Cagar Budaya',
            'user'  => Auth::user()->nama,
            'modal' => 'pengajuan.pengajuan-modal',
            'js'    => 'pengajuan.pengajuan-js',
        );
        $data['profil'] = UserModel::where(array('id_user' => Auth::user()->id_user))->first();
        $data['kecamatan'] = json_decode(file_get_contents('https://alamat.siakkab.go.id/kecByKab?kode=14.08'), true);
        $data['jenis_objek'] = Jenis_objek::all();

        $dt = PengajuanModel::where(array('diinput_oleh'=>Auth::user()->id_user))->get();

        $detail = '<a href="{{ url("u-detail-pengajuan/$id_pengajuan") }}" data-toggle="tooltip" title="Detail" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i></a> ';
        $edit = '<a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc({{ $id_pengajuan }})" title="Edit" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a> ';
        $hapus = '<a href="javascript:void(0);" id="delete-compnay" onClick="deleteFunc({{ $id_pengajuan }})" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
        $nama_objek = '{{ $nama_objek }}<br>{{$kode_alamat}}';
        $info_lain = '{{ $dimensi_lebar }}<br>{{$dimensi_tinggi}}';

        if (request()->ajax()) {
            return datatables()->of($dt)

                ->addColumn('action', $detail . $edit . $hapus)
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
                        $status = '<b><i class="text-danger">Belum disetujui</i></b>';
                    }else{
                        $status = '<b><i class="text-success">Di setujui</i></b>';
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

                ->rawColumns(['action', 'nama_objek','info_lain'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('user.konten.pengajuan.pengajuan')->with($data);
    }

    public function detail($id)
    {
        $data = array(
            'judul'     => 'Detail pengajuan',
            'user'      => Auth::user()->nama,
            'modal'     => '',
            'js'        => '',

            'profil'    => UserModel::where(array('id_user' => Auth::user()->id_user))->first(),
            'kecamatan' => json_decode(file_get_contents('https://alamat.siakkab.go.id/kecByKab?kode=14.08'), true),
            'detail'    => PengajuanModel::join('kis_jenisobjek', 'kis_jenisobjek.id', '=', 'kis_pengajuans.id_m_jenisobjek')->where(array('id_pengajuan' => $id))->first(),
            'file'      => FilePengajuanModel::where(array('id_pengajuan' => $id))->get(),
        );

        $data['alamat'] = json_decode(file_get_contents('https://alamat.siakkab.go.id/alamatByKode?kode='.$data['detail']['kode_alamat']), true);

        return view('user.konten.pengajuan.pengajuan-detail')->with($data);
    }

    public function store( Request $request)
    {
        $id = $request->id_pengajuan;

        if ($id != Null) {

            $request->validate([
                "nama_objek"            => 'required',
                "id_m_jenisobjek"       => 'required',
                "kode_alamat"           => 'required',
                "warna_benda"           => 'required',
                // "tanda"                 => 'required',
                "keutuhan_odcb"         => 'required',
                "pemeliharaan_odcb"     => 'required',
                "status_kepemilikan"    => 'required',
                "sejarah"               => 'required'

            ],[
                "nama_objek.required"           =>"Nama objek harus diisi!",
                "id_m_jenisobjek.required"      =>"Jenis objek harus diisi!",
                "kode_alamat.required"          =>"Alamat harus diisi!",
                "warna_benda.required"          =>"Warna harus diisi!",
                // "tanda.required"                =>"Tanda harus diisi!",
                "keutuhan_odcb.required"        =>"Keutuhan objek harus diisi!",
                "pemeliharaan_odcb.required"    =>"Pemeliharaan harus diisi!",
                "status_kepemilikan.required"   =>"Status kepemilikan harus diisi!",
                "sejarah.required"              =>"Sejarah harus diisi!"

            ]);
            
        }else {
            $request->validate([
                "nama_objek"            => 'required',
                "id_m_jenisobjek"       => 'required',
                "kode_alamat"           => 'required',
                "warna_benda"           => 'required',
                // "tanda"                 => 'required',
                "keutuhan_odcb"         => 'required',
                "pemeliharaan_odcb"     => 'required',
                "status_kepemilikan"    => 'required',
                "sejarah"               => 'required',

                'files'                 => 'required',
                'files.*'               => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            ],[
                "nama_objek.required"           =>"Nama objek harus diisi!",
                "id_m_jenisobjek.required"      =>"Jenis objek harus diisi!",
                "kode_alamat.required"          =>"Alamat harus diisi!",
                "warna_benda.required"          =>"Warna harus diisi!",
                // "tanda.required"                =>"Tanda harus diisi!",
                "keutuhan_odcb.required"        =>"Keutuhan objek harus diisi!",
                "pemeliharaan_odcb.required"    =>"Pemeliharaan harus diisi!",
                "status_kepemilikan.required"   =>"Status kepemilikan harus diisi!",
                "sejarah.required"              =>"Sejarah harus diisi!",

                "files.required"                =>"Foto harus diisi!",
                "files.image"                   =>" Formad foto salah!",
                "files.mimes"                   =>" Formad foto harus (jpeg,png,jpg,gif,svg)",
                "files.max"                     =>" Maksimal ukuran foto adalah 2MB",
            ]);

        }

        $data = array(

            "nama_objek"            => $request->nama_objek,
            "id_m_jenisobjek"       => $request->id_m_jenisobjek,
            "kode_alamat"           => $request->kode_alamat,
            "garis_lintang"         => $request->garis_lintang,
            "garis_bujur"           => $request->garis_bujur,
            "ketinggian"            => $request->ketinggian,
            "warna_benda"           => $request->warna_benda,
            "waktu_pembuatan"       => $request->waktu_pembuatan,
            "tanda"                 => $request->tanda,
            "dimensi_panjang"       => $request->dimensi_panjang,
            "dimensi_tinggi"        => $request->dimensi_tinggi,
            "dimensi_lebar"         => $request->dimensi_lebar,
            "dimensi_tebal"         => $request->dimensi_tebal,
            "dimensi_kaki"          => $request->dimensi_kaki,
            "dimensi_masa"          => $request->dimensi_masa,
            "dimensi_volume"        => $request->dimensi_volume,
            "diameter_badan"        => $request->diameter_badan,
            "diameter_atas"         => $request->diameter_atas,
            "keutuhan_odcb"         => $request->keutuhan_odcb,
            "pemeliharaan_odcb"     => $request->pemeliharaan_odcb,
            "status_kepemilikan"    => $request->status_kepemilikan,
            "sejarah"               => $request->sejarah,
            "diinput_oleh"          => Auth::user()->id_user,
            "diinput_pada"          => date('Y-m-d H:i:s')
        );

        if ($id != Null) {
            // Update
            $query = PengajuanModel::where('id_pengajuan', $id)->update($data);
            $get_id = $id;
        } else {
            // Create
            $query = PengajuanModel::create($data);
            $get_id = $query->id_pengajuan;
        }

        if ($query) {

            if($request->hasfile('files'))
            {
                //Hapus file lama
                $where = array('id_pengajuan' => $id);
                $file_lama  = FilePengajuanModel::where($where)->get();
                foreach ($file_lama as $value) {
                    $path = public_path('image/cagar_budaya/' . $value->file_pengajuan);
                    if (File::exists($path)) {
                        File::delete($path);
                    }  
                }
                $file = FilePengajuanModel::where('id_pengajuan', $id)->delete();

                //Upload File baru
                foreach($request->file('files') as $key => $file)
                {
                    $name = date('d-m-y H:i:s').' - '.$file->getClientOriginalName();
                    $file->storeAs('cagar_budaya',$name);

                    $data_file = array(
                        'id_pengajuan' => $get_id,
                        'file_pengajuan' => $name,
                        'diinput_oleh' => Auth::user()->id_user,
                        'diinput_pada' => date('Y-m-d H:i:s')
                    );

                    FilePengajuanModel::create($data_file);
                }
            }
        }

        return Response()->json($query);
    }

    public function edit(Request $request)
    {
        $where = array('id_pengajuan' => $request->id);
        $data  = PengajuanModel::where($where)->first();

        return Response()->json($data);
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
