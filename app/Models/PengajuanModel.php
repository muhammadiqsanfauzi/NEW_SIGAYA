<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'kis_pengajuans';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'nama_objek',
        'id_m_jenisobjek',
        'kode_alamat',
        'garis_lintang',
        'garis_bujur',
        'ketinggian',
        'warna_benda',
        'waktu_pembuatan',
        'tanda',
        'dimensi_panjang',
        'dimensi_tinggi',
        'dimensi_lebar',
        'dimensi_tebal',
        'dimensi_kaki',
        'dimensi_masa',
        'dimensi_volume',
        'diameter_badan',
        'diameter_atas',
        'keutuhan_odcb',
        'pemeliharaan_odcb',
        'status_kepemilikan',
        'sejarah',
        'diinput_oleh',
        'diinput_pada',
        'status',
        'hapus'
    ];
}
