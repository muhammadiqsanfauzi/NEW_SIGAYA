<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use DataTables;
use Illuminate\Support\Facades\File;


class DaftarUser extends Controller
{
    
    public function index()
    {
        $dt = UserModel::all();

        if (request()->ajax()) {
            return datatables()->of($dt)

                ->addColumn('col-image', function (UserModel $user) {

                    if ($user->file_foto == Null) {
                        $file_foto = asset('image/avatar3.png');
                        $file_ktp = asset('image/no-image.jpg');
                    }else{
                        $file_foto = asset('image/user/'.$user->file_foto);
                        $file_ktp = asset('image/user/'.$user->file_ktp);
                    }

                    $col0 = '<img src="'.$file_foto.'" class="rounded mx-auto d-block mb-1" width="80px">
                            <img src="'.$file_ktp.'" class="rounded mx-auto d-block" width="80px">';

                    return $col0;
                })

                ->addColumn('col-nama', function (UserModel $user) {
                    $col1 = '<div class="row">
                                <div class="col-md-4">Nama</div>
                                <div class="col-sm-8">: <b><a class="text-primary">'.$user->nama.'</a></b></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Email</div>
                                <div class="col-sm-8">: <a>'.$user->email.'</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">No HP</div>
                                <div class="col-sm-8">: <a>'.$user->hp.'</a></div>
                            </div>';
                    return $col1;
                })

                ->addColumn('col-info', function(UserModel $user){

                    if ($user->kode_alamat != Null) {
                        $alamats = json_decode(file_get_contents('https://alamat.siakkab.go.id/alamatByKode?kode='.$user->kode_alamat), true); 
                        $alamat = $alamats['data'][0]['nama_alamat'];
                    }else{
                        $alamat = '';
                    }

                    if ($user->status == 0) {
                        $status = "<b><i class='text-danger'>Belum diverifikasi</i></b>";
                    }else{
                        $status = "<b><i class='text-success'>Diverifikasi</i></b>";
                    }

                    $col2 = '<div class="row">
                                <div class="col-md-5">NIK</div>
                                <div class="col-sm-7">: <a>'.$user->nik.'</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Kelamin</div>
                                <div class="col-sm-7">: <a>'.$user->kelamin.'</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Alamat</div>
                                <div class="col-sm-7">: <a>'.$alamat.'</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">RT/RW</div>
                                <div class="col-sm-7">: <a>'.$user->rt."/".$user->rw.'</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Tempat lahir</div>
                                <div class="col-sm-7">: <a>'.$user->tpt_lahir.'</a></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5">Tanggal Lahir</div>
                                <div class="col-sm-7">: <a>'.$user->tgl_lahir.'</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Status</div>
                                <div class="col-sm-7">: <a>'.$status.'</a></div>
                            </div>';

                    return $col2;
                })

                // ->addColumn('col-action', $setujui.$hapus)
                ->addColumn('col-action', function(UserModel $user){

                    $verif = '<a href="javascript:void(0);" id="verifikasi" onClick="verifFunc('.$user->id_user.')" title="Verifikasi user" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a> ';
                    $hapus = '<a href="javascript:void(0);" id="delete" onClick="deleteFunc('.$user->id_user.')" title="Delete user" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

                    if ($user->status == 0) {
                        $aksi = $verif.$hapus;
                    }else{
                        $aksi = $hapus;
                    }

                    return $aksi;
                })

                ->rawColumns(['col-nama','col-info','col-action','col-image'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('daftar_user.v_daftar_user');
    }

    public function verifikasi(Request $request)
    {
        $id = $request->id;

        $data = array(

            "status"                => '1',
        );

        $query = UserModel::where('id_user', $id)->update($data);
        return Response()->json($query);
    }

    public function delete(Request $request)
    {
        
        // delete file
        $where = array('id_user' => $request->id);
        $files  = UserModel::where($where)->first();

            $path_foto = public_path('image/user/' . $files->file_foto);
            if (File::exists($path_foto)) {
                File::delete($path_foto);
            }
            $path_ktp = public_path('image/user/' . $files->file_ktp);
            if (File::exists($path_ktp)) {
                File::delete($path_ktp);
        }

        //delete data dari db
        $data = UserModel::where('id_user', $request->id)->delete();
        return Response()->json($data);
    }
    
}