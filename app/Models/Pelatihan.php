<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'riwayat_pelatihan';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = ['uuid','admin_id','biodata_id','nama_pelatihan','sertifikat','tahun'];
    public $timestamps = false;

    function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
