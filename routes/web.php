<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminController,
    LoginController,
    BiodataController,
    PendidikanController,
    PelatihanController,
    PekerjaanController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LoginController::class,'index']);

Route::get('login', [LoginController::class,'index'])->name('admin.login');
Route::post('login', [LoginController::class,'login'])->name('admin.login.post');
Route::get('register', [LoginController::class,'register'])->name('register');
Route::post('register', [LoginController::class,'storeRegister'])->name('admin.register.post');

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){


    Route::group(['middleware' => 'admin'],function(){
        Route::get('logout', [LoginController::class,'logout'])->name('logout');

        // Route::group(['prefix' => 'dashboard'],function(){
        //     Route::get('/',[DashboardController::class,'index'])->name('dashboard');
          
        // });

        Route::group(['prefix' => 'admin','middleware' => ['auth:admin','role:Admin']],function(){
            Route::get('/',[AdminController::class,'index'])->name('admin');
            Route::get('create',[AdminController::class,'create'])->name('create-admin');
            Route::post('store',[AdminController::class,'store'])->name('storeAdmin');
            Route::get('show/{admin:uuid}',[AdminController::class,'show']);
            Route::post('update/',[AdminController::class,'update'])->name('updateAdmin');
            Route::get('password/{admin:uuid}',[AdminController::class,'password'])->name('password-admin');
            Route::post('updatePassword',[AdminController::class,'updatePassword'])->name('updatePassword');
            Route::delete('destroy/{uuid}',[AdminController::class,'destroy']);
        });
       
        Route::group(['prefix' => 'biodata','middleware' => ['role:Admin,Karyawan']],function(){
            Route::get('/',[BiodataController::class,'index'])->name('biodata');
            Route::get('create',[BiodataController::class,'create'])->name('create-biodata');
            Route::post('store',[BiodataController::class,'store'])->name('storeBiodata');
            Route::get('show/{biodata:uuid}',[BiodataController::class,'show']);
            Route::post('update/',[BiodataController::class,'update'])->name('updateBiodata');
            Route::get('password/{biodata:uuid}',[BiodataController::class,'password'])->name('password-biodata');
            Route::post('updatePassword',[BiodataController::class,'updatePassword'])->name('updatePassword');
            Route::delete('destroy/{uuid}',[BiodataController::class,'destroy']);
        });

        Route::group(['prefix' => 'pendidikan','middleware' => ['auth:admin','role:Admin,Karyawan' ]],function(){
            Route::get('/',[PendidikanController::class,'index'])->name('pendidikan');
            Route::get('create',[PendidikanController::class,'create'])->name('create-pendidikan');
            Route::post('store',[PendidikanController::class,'store'])->name('storePendidikan');
            Route::get('show/{pendidikan:uuid}',[PendidikanController::class,'show']);
            Route::post('update/',[PendidikanController::class,'update'])->name('updatePendidikan');
            Route::delete('destroy/{uuid}',[PendidikanController::class,'destroy']);
        });
        
        Route::group(['prefix' => 'pelatihan','middleware' => ['auth:admin','role:Admin,Karyawan' ]],function(){
            Route::get('/',[PelatihanController::class,'index'])->name('pelatihan');
            Route::get('create',[PelatihanController::class,'create'])->name('create-pelatihan');
            Route::post('store',[PelatihanController::class,'store'])->name('storePelatihan');
            Route::get('show/{pelatihan:uuid}',[PelatihanController::class,'show']);
            Route::post('update/',[PelatihanController::class,'update'])->name('updatePelatihan');
            Route::delete('destroy/{uuid}',[PelatihanController::class,'destroy']);
        });
       
        Route::group(['prefix' => 'pekerjaan','middleware' => ['auth:admin','role:Admin,Karyawan' ]],function(){
            Route::get('/',[PekerjaanController::class,'index'])->name('pekerjaan');
            Route::get('create',[PekerjaanController::class,'create'])->name('create-pekerjaan');
            Route::post('store',[PekerjaanController::class,'store'])->name('storePekerjaan');
            Route::get('show/{pekerjaan:uuid}',[PekerjaanController::class,'show']);
            Route::post('update/',[PekerjaanController::class,'update'])->name('updatePekerjaan');
            Route::delete('destroy/{uuid}',[PekerjaanController::class,'destroy']);
        });
         
    });
});
