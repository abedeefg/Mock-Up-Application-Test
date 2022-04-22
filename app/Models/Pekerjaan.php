<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'riwayat_pekerjaan';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = ['uuid','admin_id','biodata_id','nama_perusahaan','posisi_terakhir','pendapatan_terakhir','tahun'];
    public $timestamps = false;

    function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
