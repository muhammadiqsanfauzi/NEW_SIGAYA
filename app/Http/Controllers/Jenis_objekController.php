<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Jenis_objek;
use DataTables;


class Jenis_objekController extends Controller
{
    
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $jenis_objek = jenis_objek::latest()->paginate(5);
        return view('jenis_objek.v_jenis_objek_mif', compact('jenis_objek'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function jenis_objek_ajax(){
        
        return Datatables::eloquent(Jenis_objek::query())->make(true);
    }

    public function dashboard()
    {
        $jenis_objek = jenis_objek::all();
        $jenis_objek = jenis_objek::all();
        //fungsi eloquent menampilkan data menggunakan pagination
        $jenis_objek = jenis_objek::latest()->paginate(5);
        return view('dashboard_mif', compact('jenis_objek'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $jenis_objek = jenis_objek::all();
        return view('jenis_objek.c_jenis_objek_mif', compact('jenis_objek'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'jenis_objek'=> 'required|min:5',
           
        ]);
        // jenis_objek::create($request->all());


    $jenis_objek          = htmlspecialchars($request->jenis_objek, true);
            $konversi       = strtolower($jenis_objek); //konversi huruf menjadi huruf kecil semua
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
            $url_jenis_objek     = str_replace(":", "_", $konversi11);


            $data = array(
                
            'jenis_objek'   => htmlspecialchars($request->jenis_objek, true),
            'url'           => $url_jenis_objek,
               
            );
     jenis_objek::create($data);
       return redirect()->route('jenis_objek.index')
                        ->with('success','satuan created successfully..');
    }




    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id user
        $jenis_objek = jenis_objek::find($id);
        return view('jenis_objek.detail', compact('jenis_objek'));
    }

   public function edit(Request $request)
    {   
        // $data=[
        // 'jenis_objek'=>$request->jenis_objek,
        // 'url'=>$request->url,
        // ];


    $jenis_objek          = htmlspecialchars($request->jenis_objek, true);
            $konversi       = strtolower($jenis_objek); //konversi huruf menjadi huruf kecil semua
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
            $url_jenis_objek     = str_replace(":", "_", $konversi11);


            $data = array(
                
            'jenis_objek'   => htmlspecialchars($request->jenis_objek, true),
            'url'           => $url_jenis_objek,
               
            );


        $simpan=jenis_objek::find($request->id)->update($data);
        return redirect('jenis_objek')->with('success', 'Berhasil Edit jenis_objek');;
    }

    public function update(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'jenis_objek' => 'required',

        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        jenis_objek::find($request->id)->update($request->all());


        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('jenis_objek')->with('success', 'jenis_objek Berhasil Diupdate');
    }


    public function destroy($jenis_objek)
    {   
        jenis_objek::find($jenis_objek)->delete();
        return redirect('jenis_objek')->with('success','jenis_objek Berhasil Dihapus..');
    }
}