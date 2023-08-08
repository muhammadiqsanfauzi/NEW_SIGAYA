<?php
namespace App\Http\Controllers;
use App\Models\InformasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class InformasiController extends Controller
{
    
    public function index()
    {
        $data = array(
            'judul' => 'Daftar Informasi',
        );
        $dt = InformasiModel::all();

        if (request()->ajax()) {
            return datatables()->of($dt)

                ->addColumn('image', function (InformasiModel $informasi) {

                    $file = asset('image/informasi/'.$informasi->file);
                    $col = '<img src="'.$file.'" class="rounded mx-auto d-block" width="80px">';
                    return $col;
                })

                ->addColumn('isi', function (InformasiModel $informasi) {

                    $isi = substr($informasi->isi, 0, 150);
                    return $isi;
                })

                ->addColumn('action', function(InformasiModel $informasi){

                    $edit = '<a href="javascript:void(0);" id="edit" onClick="editFunc('.$informasi->id.')" title="Edit informasir" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a> ';
                    $hapus = '<a href="javascript:void(0);" id="delete" onClick="deleteFunc('.$informasi->id.')" title="Delete Informasi" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

                    $aksi = $edit.$hapus;
                    return $aksi;
                })

                ->rawColumns(['isi','action','image'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('informasi.v_informasi')->with($data);
    }

    public function store( Request $request)
    {
        $id = $request->id;

        $request->validate([
            "judul" => 'required',
            "isi"   => 'required',
            
        ],[
            "judul.required" =>"Judul harus diisi!",
            "isi.required"   =>"isi informasi harus diisi!",
            
        ]);


        if($request->file('files')){

            $file = $request->file('files');

            //Hapus file lama
            $get  = InformasiModel::find($id);
            if ($get) {
                $path = public_path('image/informasi/' . $get->file);
                if (File::exists($path)) {
                    File::delete($path);
                }   
            }

            //Upload file baru
            $name = date('d-m-y H:i:s').' - '.$file->getClientOriginalName();
            $file->storeAs('informasi',$name);

        }else {
            if (isset($request->file_lama)) {   
                $name = $request->file_lama;
            }else{
                $name = '';
            }
        }


        $judul          = htmlspecialchars($request->judul, true);
        $konversi       = strtolower($judul); //konversi huruf menjadi huruf kecil semua
        $konversi2      = str_replace(" ", "_", $konversi);
        $konversi3      = str_replace("!", "_", $konversi2);
        $konversi4      = str_replace("?", "_", $konversi3);
        $konversi5      = str_replace(",", "_", $konversi4);
        $konversi6      = str_replace(".", "_", $konversi5);
        $konversi7      = str_replace("/", "_", $konversi6);
        $konversi8      = str_replace("(", "", $konversi7);
        $konversi9      = str_replace(")", "", $konversi8);
        $konversi10     = str_replace("&", "_", $konversi9);
        $konversi11     = str_replace("'", "", $konversi10);
        $url            = str_replace(":", "_", $konversi11);

        $data = array(

            "judul"                 => $request->judul,
            "url"                   => $url,
            "isi"                   => $request->isi,
            "file"                  => $name,
            
            "diinput_oleh"          => session('id_admin'),
            "diinput_pada"          => date('Y-m-d H:i:s')
        );

        if ($id == Null) {
            // Create
            $query = InformasiModel::create($data);
        } else {
            // Update
            $query = InformasiModel::where('id', $id)->update($data);
        }

        return Response()->json($query);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = InformasiModel::where($where)->first();

        return Response()->json($data);
    }

    public function delete(Request $request)
    {
        // delete file
        $get  = InformasiModel::find($request->id);

        $path_file = public_path('image/informasi/' . $get->file);
        if (File::exists($path_file)) {
            File::delete($path_file);
        }

        //delete data dari db
        $data = InformasiModel::where('id', $request->id)->delete();
        return Response()->json($data);
    }
    
}