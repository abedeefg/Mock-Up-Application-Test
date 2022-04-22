<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Biodata;
use DataTables,Hash;

class BiodataController extends Controller
{
    private  $routeIndex;        
    private  $nameFolder;        
    public function __construct(){
        $this->routeIndex = 'biodata';
        $this->nameFolder = 'biodata';
    }

    function index(Request $request){
        if ($request->ajax()) {
            if (auth('admin')->user()->level=="Admin") {
                $data = Biodata::with('admin')->get();
            }else{
                $data = Biodata::with('admin')->where('admin_id',auth('admin')->user()->id)->get();

            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                        return  '<a href="'.url('admin/biodata/show/'.$row->uuid).'" class="btn btn-sm btn-info">
                                    <i class="fas fa-pencil-alt"></i> 
                                </a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.biodata.index');
    }

    function create(){
        return view('admin.biodata._form');
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

    function show(Biodata $biodata){
        $prefix = [ 'title' => 'Management Admin','menu' => 'Admin','active' => 'Update Admin'];
        return view('admin.biodata._form',compact('biodata','prefix'));
    }

    function update(Request $request){
        $data['uuid'] = Str::uuid()->toString();
        $data['posisi'] = $request['posisi'];
        $data['no_ktp'] = $request['no_ktp'];
        $data['nama'] = $request['nama'];
        $data['tempat_lahir'] = $request['tempat_lahir'];
        $data['tanggal_lahir'] = date('Y-m-d',strtotime($request['tanggal_lahir']));
        $data['jenis_kelamin'] = $request['jenis_kelamin'];
        $data['agama'] = $request['agama'];
        $data['golongan_darah'] = $request['golongan_darah'];
        $data['status'] = $request['status'];
        $data['alamat_ktp'] = $request['alamat_ktp'];
        $data['alamat_ktp'] = $request['alamat_ktp'];
        $data['alamat_tinggal'] = $request['alamat_tinggal'];
        $data['email'] = $request['email'];
        $data['no_telp'] = $request['no_telp'];
        $data['no_telp_orang_terdekat'] = $request['no_telp_orang_terdekat'];
        $data['skill'] = $request['skill'];
        $data['bersedia'] = $request['bersedia'];
        $data['penghasilan'] = $request['penghasilan'];
        // $data['status'] = $request['status'];
      
        // $data['status'] = $request['status'];
       
        try {
            // Booking::where('uuid',$uuid)->update($data);
            Biodata::updateOrCreate(['admin_id' => $request['admin_id']],$data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "biodata"
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
