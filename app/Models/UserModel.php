<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    
    protected $table = 'kis_users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nama',
        'email',
        'hp',
        'nik',
        'kelamin',
        'kode_alamat',
        'rt',
        'rw',
        'tmp_lahir',
        'tgl_lahir',
        'file_ktp',
        'file_foto',
        'user',
        'password',
        'diinput_oleh',
        'diinput_pada',
        'hapus',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }

    public function getAuthIdentifierName()
    {
        return 'id_user';
    }
}
