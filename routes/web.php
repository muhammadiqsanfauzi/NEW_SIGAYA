<?php

use App\Http\Controllers\AuthUser;
use App\Http\Controllers\UserBeranda;
use App\Http\Controllers\UserPengajuan;
use App\Http\Controllers\UserProfil;
use App\Http\Controllers\DaftarUser;
use App\Http\Controllers\DaftarPengajuan;
use App\Http\Controllers\Front_mifController;
use App\Http\Controllers\Jenis_objekController;
use App\Http\Controllers\Cagar_budayaController;
use App\Http\Controllers\DepanController;
use App\Http\Controllers\DepanCagarBudayaController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DepanInformasiController;

use Illuminate\Support\Facades\Route;

Route::get('/', [DepanController::class, 'index'])->name('index'); 
Route::get('cagar_budaya/{key}', [DepanCagarBudayaController::class, 'kategori'],['url' => '{key}']);

//Daftar Informasi
Route::get('info/all', [DepanInformasiController::class, 'index'])->name('index');
Route::get('info/{url}', [DepanInformasiController::class, 'detail'],['url' => '{url}']);

Route::get('peta/{url}', [PetaController::class, 'index'],['url' => '{url}']);
Route::post('peta_cagar_budaya', [PetaController::class, 'getData']);
Route::post('peta_pengajuan', [PetaController::class, 'getDataPengajuan']);


//--> Route View Tampilan <--
Route::view('tanjak', 'tanjak.v_login_mif');
Route::get('login','App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login','App\Http\Controllers\AuthController@proses_login');

// AUTH ADMIN 
Route::group(['middleware' => ['login']], function () {

    Route::group(['middleware' => ['login:1']], function () {
        Route::get('superadmin','App\Http\Controllers\SuperadminController@index');
    });

    Route::group(['middleware' => ['login:2']], function () {
        Route::get('adminkantor','App\Http\Controllers\AdminkantorController@index');
    });

    Route::group(['middleware' => ['login:3']], function () {
        Route::get('operator','App\Http\Controllers\OperatorController@index')->name('operator');   
    });

   
    // RS JENIS OBJEK
    Route::resource('jenis_objek',Jenis_objekController::class); 

    // RM EDIT / UPDATE OBJEK
    Route::get('jenis_objek/edit/{id}',[Jenis_objekController::class,'edit'] );
    Route::put('jenis_objek/update',[Jenis_objekController::class,'update'] );


    // JS JENIS OBJEK
    Route::get('json-jenis_objek','App\Http\Controllers\Jenis_objekController@jenis_objek_ajax');

    // TABEL JENIS OBJEK
    Route::post('jenis_objek/edit','App\Http\Controllers\Jenis_objekController@edit');
    Route::get('hapus/jenis_objek/{id}','App\Http\Controllers\Jenis_objekController@destroy');

    
    // RS CAGAR BUDAYA
    Route::resource('cagar_budaya',Cagar_budayaController::class); 

     // RM EDIT / UPDATE CAGAR BUDAYA
    Route::get('cagar_budaya/edit/{id}',[Cagar_budayaController::class,'edit'] );
    Route::put('cagar_budaya/update',[Cagar_budayaController::class,'update'] );


    // JS CAGAR BUDAYA
    Route::get('json-cagar_budaya','App\Http\Controllers\Cagar_budayaController@cagar_budaya_ajax');

    // TABEL CAGAR BUDAYA
    Route::post('cagar_budaya/edit','App\Http\Controllers\Cagar_budayaController@edit');
    Route::get('hapus/cagar_budaya/{id}','App\Http\Controllers\Cagar_budayaController@destroy');





    //Daftar User - AZMI
    Route::get('daftar_user', [DaftarUser::class, 'index'])->name('daftar_user');
    Route::post('verifikasi-user', [DaftarUser::class, 'verifikasi'])->name('verifikasi-user');
    Route::post('delete-user', [DaftarUser::class, 'delete']);

    //Daftar Pengajuan -AZMI
    Route::get('daftar_pengajuan', [DaftarPengajuan::class, 'index'])->name('daftar_pengajuan');
    Route::get('detail_pengajuan/{id}', [DaftarPengajuan::class, 'detail'],['url' => '{id}']);
    Route::post('verifikasi-pengajuan', [DaftarPengajuan::class, 'verifikasi'])->name('verifikasi-pengajuan');
    Route::post('delete-pengajuan', [DaftarPengajuan::class, 'delete']);

    //Daftar Informasi -AZMI
    Route::get('read_informasi', [InformasiController::class, 'index'])->name('index');
    Route::post('store_informasi', [InformasiController::class, 'store'])->name('store');
    Route::post('edit_informasi', [InformasiController::class, 'edit'])->name('edit');
    Route::post('delete_informasi', [InformasiController::class, 'delete']);

    // LOG OUT
    Route::get('logout','App\Http\Controllers\AuthController@logout')->name('logout');


});


//AZMI PUNYA
// Route::get('dashboard', [AuthUser::class, 'dashboard']); 
Route::get('u-login', [AuthUser::class, 'showFormLogin']);
Route::post('u-login', [AuthUser::class, 'login']); 
Route::get('u-register', [AuthUser::class, 'showFormRegister']);
Route::post('u-register', [AuthUser::class, 'register']); 

Route::group(['middleware' => 'auth'], function () {

    //User Beranda
    Route::get('u-beranda', [UserBeranda::class, 'index']);

    //User Pengajuan
    Route::get('u-read-pengajuan', [UserPengajuan::class, 'index']);
    Route::get('u-detail-pengajuan/{id}', [UserPengajuan::class, 'detail'],['url' => '{id}']);
    Route::post('u-store-pengajuan', [UserPengajuan::class, 'store']);
    Route::post('u-edit-pengajuan', [UserPengajuan::class, 'edit']);
    Route::post('u-delete-pengajuan', [UserPengajuan::class, 'delete']);

    //User Profil
    Route::get('u-profil', [UserProfil::class, 'index']);
    Route::post('u-store-profil', [UserProfil::class, 'store']);
    Route::post('u-edit-profil', [UserProfil::class, 'get_profil']);
    Route::post('u-edit-password', [UserProfil::class, 'store_password']);
    Route::post('u-kec', [UserProfil::class, 'get_kec']);
    Route::post('u-kampung', [UserProfil::class, 'get_kampung']);

    Route::get('u-logout', [AuthUser::class, 'logout'])->name('u-logout');
});


Route::get('petas', function(){
    $config = array();
    $config['center'] = 'auto';
    $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

    app('map')->initialize($config);

    // set up the marker ready for positioning
    // once we know the users location
    $marker = array(
    );
    app('map')->add_marker($marker);

    $map = app('map')->create_map();
    echo "<html><head><script type='text/javascript'>var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
});

Route::get('/{any}', [DepanCagarBudayaController::class, 'detail'],['url' => '{any}']);
