<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_objek extends Model
{
    use HasFactory;
    protected $table    = 'kis_jenisobjek';
    protected $fillable = [
        'jenis_objek','url','url_posting',
    ];

    public function jenis_objek()
    {
        
        return $this->hasOne(jenis_objek::class);
    }   
    
}

