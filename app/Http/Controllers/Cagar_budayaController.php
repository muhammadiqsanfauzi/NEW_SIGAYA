<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cagar_budaya;
use App\Models\Jenis_objek;
use DataTables; 
use DB;

class Cagar_budayaController extends Controller
{   
    public function ambil_cagar_budaya($id)
    {

        $cagar_budaya = jenis_objek::with('cagar_budaya.jenis_objek')->where('jenis_objek_id', $id)->select('kis_cagarbudaya.*')->get();
        return $cagar_budaya;
    }

    public function cagar_budaya()
    {
       //dd('tes');
        //fungsi eloquent menampilkan data menggunakan pagination
        // $komoditas = Komoditas::all();
        $cagar_budaya = cagar_budaya::latest()->paginate(5);
        return view('cagar_budaya.v_cagar_budaya_mif', compact('cagar_budaya','jenis_objek'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }

   

    public function index(Type $var = null) 
    {
        // $slider = db::table('kis_slider')->get();                    // Mengirim Komoditas Harus Kirimkan Semua Yang di Tampilkan di Halaman Jika Tidak akan Tampil
        $cagar_budaya = db::table('kis_cagarbudaya')->get();              //  Mengirimkan Data Cagar Budaya
        $jenis_objek = Jenis_objek::all(); 
        return view('cagar_budaya.v_cagar_budaya_mif', compact('cagar_budaya','jenis_objek'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function cagar_budaya_ajax()
    {
        return Datatables::eloquent(cagar_budaya::with('jenis_objek')->select('kis_cagarbudaya.*'))->make(true);                    // Controller Menampilkan Data Cagar BUdaya Sesuai Dengan Jenis Objek di cagar BUdaya
    }

    
    public function dashboard()
    {
        $cagar_budaya = cagar_budaya::all();
        //fungsi eloquent menampilkan data menggunakan pagination
        $cagar_budaya = cagar_budaya::latest()->paginate(5);
        return view('dashboard_mif', compact('cagar_budaya'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $cagar_budaya = cagar_budaya::all();
        // $jenis_objek = jenis_objek::all();
        return view('cagar_budaya.c_komoditas_mif', compact('cagar_budaya'));
    }



    public function store(Request $request)
    {

        $nama_objek     = htmlspecialchars($request->nama_objek, true);
        $konversi       = strtolower($nama_objek); //konversi huruf menjadi huruf kecil semua
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
        $url_nama_objek     = str_replace(":", "_", $konversi11);

        $simpan=Cagar_budaya::insert([

            'id_objek'=>$request->id_objek,
            'nama_objek'=>$request->nama_objek,
            'url_objek'    => $url_nama_objek,
            'jenis_objek_id'=>$request->jenis_objek_id,
            'kode_alamat'=>$request->kode_alamat,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'keterangan'=>$request->keterangan,
            'foto'=>$request->file('gambar')->getClientOriginalName(),
            'file_sk'=>$request->file('file')->getClientOriginalName(),

        ]);

        //  $validatedData = $request->validate([
        //  'file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
 
        if($simpan){
            $request->file('gambar')->storeAs('public/gambar',$request->file('gambar')->getClientOriginalName());
            $request->file('file')->storeAs('public/file',$request->file('file')->getClientOriginalName());

            return redirect('cagar_budaya')->with('success', 'Tambah Data Berhasil');
        }
    }


    

    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id user
        $cagar_budaya = cagar_budaya::find($id);
        return view('cagar_budaya.detail', compact('cagar_budaya'));
    }

    public function edit(Request $request)
    {
        //  dd($request->hasFile('file'));


        $nama_objek     = htmlspecialchars($request->nama_objek, true);
        $konversi       = strtolower($nama_objek); //konversi huruf menjadi huruf kecil semua
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
        $url_nama_objek     = str_replace(":", "_", $konversi11);

        if($request->hasFile('gambar')){
            $data=[
            'id_objek'=>$request->id_objek,
            'nama_objek'=>$request->nama_objek,
            'jenis_objek_id'=>$request->jenis_objek_id,
            'kode_alamat'=>$request->kode_alamat,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'keterangan'=>$request->keterangan,
            'foto'=>$request->file('gambar')->getClientOriginalName(),
            'file_sk'=>$request->file('file')->getClientOriginalName(),
            ];

            $request->file('gambar')->storeAs('public/gambar',$request->file('gambar')->getClientOriginalName());
            $request->file('file')->storeAs('public/file',$request->file('file')->getClientOriginalName());
        }else{
            $data=[
            'id_objek'=>$request->id_objek,
            'nama_objek'=>$request->nama_objek,
            'jenis_objek_id'=>$request->jenis_objek_id,
            'kode_alamat'=>$request->kode_alamat,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'keterangan'=>$request->keterangan,
            ];
        }

        $simpan=Cagar_budaya::find($request->id)->update($data);

        return redirect('cagar_budaya')->with('success', 'Berhasil Edit Cagar Budaya');;

        
    }


    public function update(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'cagar_budaya' => 'required',
            'id_objek' => 'required',
            'nama_objek' => 'required',
            'jenis_objek_id' => 'required',
            'kode_alamat' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'keterangan' => 'keterangan',

        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        cagar_budaya::find($request->id)->update($request->all());


        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('cagar_budaya')->with('success', 'cagar_budaya Berhasil Diupdate');
    }

    public function destroy($cagar_budaya)
    {
        cagar_budaya::find($cagar_budaya)->delete();
        return redirect('cagar_budaya')->with('success', 'Cagar_budaya Berhasil Dihapus..');
    }
}
