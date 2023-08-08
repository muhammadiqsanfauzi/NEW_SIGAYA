<?php

namespace App\Models;

use Database\Factories\SomeFancyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cagar_budaya extends Model
{
    use HasFactory;
    protected $table    = 'kis_cagarbudaya';
    protected $fillable = [
        'nama_objek','url_objek','id_objek','jenis_objek_id','kode_alamat','longitude','latitude','keterangan','foto','file_sk',];

    public function Cagar_budaya()
    {
        
        return $this->hasOne(cagar_budaya::class);
    }
    
    public function Jenis_objek()
    {
      return $this->belongsTo('App\Models\Jenis_objek');
    }
}