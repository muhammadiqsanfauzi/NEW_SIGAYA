<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{    
    protected $connection = 'mysql2';

    protected $table = 'r_pegawai_aktual';
    protected $fillable = [
        'id',
        'id_pagawai',
        'nip_baru',
        'nama_pegawai',
        'status_kepegawaian',
        'kode_unor',
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // // protected $casts = [
    // //     'email_verified_at' => 'datetime',
    // // ];

    // public function getAuthPassword()
    // {
    //     return $this->attributes['password'];
    // }

    // public function getAuthIdentifierName()
    // {
    //     return 'id_user';
    // }
}
