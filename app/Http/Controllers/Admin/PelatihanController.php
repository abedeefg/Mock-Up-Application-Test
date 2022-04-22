<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Models\Pelatihan;
use DataTables,Hash;

class PelatihanController extends Controller
{
    private  $routeIndex;        
    private  $nameFolder;        
    public function __construct(){
        $this->routeIndex = 'pelatihan';
        $this->nameFolder = 'pelatihan';
    }

    function index(Request $request){
        if ($request->ajax()) {
           
            if (auth('admin')->user()->level=="Admin") {
                $data = Pelatihan::all();
            }else{
                $data = Pelatihan::with('admin')->where('admin_id',auth('admin')->user()->id)->get();

            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('delete', function($row){
                        return  '<a href="javascript:void(0)" data-href="'.url('admin/pelatihan/destroy/'.$row->uuid).'" onclick="deleteData(this)" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i>
                        </a>';
                    })
                    ->addColumn('action',function($row){
                        return  '<a href="'.url('admin/pelatihan/show/'.$row->uuid).'" class="btn btn-sm btn-info">
                                    <i class="fas fa-pencil-alt"></i> 
                                </a>';
                    })
                
                    ->rawColumns(['delete','action'])
                    ->make(true);
        }
        return view('admin.pelatihan.index');
    }

    function create(){
        return view('admin.pelatihan._form');
    }

    function store(Request $request){

        $data['uuid'] = Str::uuid()->toString();
        $data['admin_id'] = auth('admin')->user()->id;
        $data['nama_pelatihan'] = $request['nama_pelatihan'];
        $data['sertifikat'] = $request['sertifikat'];
      
        $data['tahun'] = $request['tahun'];
       
     
        try {
            Pelatihan::insert($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => 'pelatihan'
        ]);
    }

    function show(Pelatihan $pelatihan){
        $prefix = [ 'title' => 'Management Admin','menu' => 'Admin','active' => 'Update Admin'];
        return view('admin.pelatihan._form',compact('pelatihan','prefix'));
    }

    function update(Request $request){
        $uuid = $request['uuid'];
        $data['nama_pelatihan'] = $request['nama_pelatihan'];
        $data['sertifikat'] = $request['sertifikat'];
      
        $data['tahun'] = $request['tahun'];
     
        try {
            Pelatihan::where('uuid',$uuid)->update($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "pelatihan"
        ]);
    }

   

    function destroy($uuid){
        $pelatihan = Pelatihan::find($uuid);
        try {
           
            $pelatihan->delete();
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "pelatihan"
        ]);
    }
}
