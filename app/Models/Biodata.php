<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = ['uuid','admin_id','posisi','nama','no_ktp','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','golongan_darah','status','alamat_ktp','alamat_tinggal','email','no_telp','no_telp_orang_terdekat','skill','bersedia','penghasilan'];

    function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
