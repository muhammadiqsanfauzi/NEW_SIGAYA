<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class InformasiModel extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    
    protected $table = 'kis_informasis';
    protected $fillable = [
        'judul',
        'url',
        'isi',
        'file',
        'diinput_oleh',
        'diinput_pada',
        'hapus',
    ];
}
