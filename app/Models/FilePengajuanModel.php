<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilePengajuanModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'kis_file_pengajuans';
    protected $primaryKey = 'id_file_pengajuan';
    protected $fillable = [
        'id_pengajuan',
        'file_pengajuan',
        'diinput_oleh',
        'diinput_pada',
        'hapus',
    ];
}
