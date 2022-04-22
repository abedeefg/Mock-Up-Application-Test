<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Admin extends Model
// {
//     use HasFactory;

//     protected $primaryKey = 'uuid';
//     protected $keyType = 'string';
//     protected $fillable = ['id','uuid','fullname','email','password','status'];

// }



use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = ['id','uuid','nama_lengkap','email','password','level','status'];

   
}

