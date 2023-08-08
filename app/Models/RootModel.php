<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RootModel extends Model
{    
    protected $connection = 'mysql3';

    protected $table = 'kis_users';
    protected $fillable = [
        'id_user',
        'id_pagawai',
        'kode_unor',
        'id_app',
        'tingkatan_level',
        'nama_pegawai',
        'level',
        'password'
    ];
}
