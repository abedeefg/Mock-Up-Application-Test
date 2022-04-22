<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


use App\Models\Admin;
use DataTables,Hash;

class AdminController extends Controller
{
    private  $routeIndex;        
    private  $nameFolder;        
    public function __construct(){
        $this->routeIndex = 'admin';
        $this->nameFolder = 'admin';
    }

    function index(Request $request){
        if ($request->ajax()) {
            $data = Admin::all();
         
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('delete', function($row){
                        return  '<a href="javascript:void(0)" data-href="'.url('admin/admin/destroy/'.$row->uuid).'" onclick="deleteData(this)" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i>
                        </a>';
                    })
                    ->addColumn('action',function($row){
                        return  '<a href="'.url('admin/admin/show/'.$row->uuid).'" class="btn btn-sm btn-info">
                                    <i class="fas fa-pencil-alt"></i> 
                                </a>';
                    })
                    ->addColumn('password',function($row){
                        return  '<a href="'.url('admin/admin/password/'.$row->uuid).'" class="btn btn-sm btn-warning">
                                    <i class="fas fa-key"></i>
                                </a>';
                    })
                    ->rawColumns(['delete','action','password'])
                    ->make(true);
        }
        return view('admin.admin.index');
    }

    function create(){
        return view('admin.admin._form');
    }

    function store(Request $request){

        $data['uuid'] = Str::uuid()->toString();
        $data['nama_lengkap'] = $request['nama_lengkap'];
        $data['email'] = $request['email'];
        $data['password'] = bcrypt($request['password']);
        $data['status'] = $request['status'];
        $data['level'] = "Admin";
        

        try {
            Admin::create($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => 'admin'
        ]);
    }

    function show(Admin $admin){
        $prefix = [ 'title' => 'Management Admin','menu' => 'Admin','active' => 'Update Admin'];
        return view('admin.admin._form',compact('admin','prefix'));
    }

    function update(Request $request){
        $uuid = $request['uuid'];
        $data['nama_lengkap'] = $request['nama_lengkap'];
        $data['email'] = $request['email'];
        $data['level'] = "Admin";
        $data['status'] = $request['status'];
        try {
            Admin::where('uuid',$uuid)->update($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "admin"
        ]);
    }

    function password(Admin $admin){
        $prefix = [ 'title' => 'Management Admin','menu' => 'Admin','active' => 'Update Password'];

        return view('admin.admin.password',compact('admin','prefix'));
    }

    function updatePassword(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'rePassword'  => 'required|same:newPassword'
        ]);

        $uuid = $request['uuid'];
        $row_result = Admin::select('password','uuid')->where('uuid',$uuid)->first();
            
       
        if (!Hash::check($request['oldPassword'],$row_result['password'])) {
            $message =  "wrong password";
        }else {
            $data['password'] = bcrypt($request['newPassword']);
            try {
                Admin::where('uuid',$uuid)->update($data);
                $message = 'success change password';
            } catch (\Exception $exception){
                $message = $exception->getMessage();
            }
        }
        return response()->json([
            'message' => $message,
            'route' => "admin"
        ]);

    }

    function destroy($uuid){
        $admin = Admin::find($uuid);
        try {
           
            $admin->delete();
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "admin"
        ]);
    }

}
