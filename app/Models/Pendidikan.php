<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = ['uuid','admin_id','biodata_id','jenjang_pendidikan_terakhir','nama_institusi','jurusan','tahun_lulus','ipk'];

    function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
