<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use Hash;
class LoginController extends Controller
{
    function index(){
        return view('admin.login');
    }
    function login(Request $request){
       
        if (auth('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ],$request->remeber_me)) {
            if (auth('admin')) {
                if (auth('admin')->user()->status=="1") {
                    return response()->json(['message' => 'success']);    
                }
                return response()->json(['message' => 'Account Non Actived']);
            }else{
                return response()->json(['message' => 'invalid']);
            }
        }
        // elseif(auth('dokter')->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ],$request->remeber_me)){
        //     if (auth('dokter')) {
        //         return response()->json(['message' => 'success']);
        //     }else{
        //         return response()->json(['message' => 'invalid']);
        //     }
        // };
        return response()->json(['message' =>'Username/Password Salah!!']);
    }

    function register(){
        return view('admin.register');
    }
    
    function storeRegister(Request $request){
        $data = $this->validate($request,[
            'email' => 'required|email|unique:admin,email',
            'password' => 'required',
        ]);

        $data['uuid'] = Str::uuid()->toString();
        $data['nama_lengkap'] = $request['email'];
        $data['email'] = $request['email'];
        $data['password'] = bcrypt($request['password']);
        $data['status'] = "1";
        $data['level'] = "Karyawan";
        
      
        try {
            Admin::create($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => 'register'
        ]);

    }
    public function logout(){
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
