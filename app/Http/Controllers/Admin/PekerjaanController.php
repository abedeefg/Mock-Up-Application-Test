<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Models\Pekerjaan;
use DataTables,Hash;

class PekerjaanController extends Controller
{
    private  $routeIndex;        
    private  $nameFolder;        
    public function __construct(){
        $this->routeIndex = 'pekerjaan';
        $this->nameFolder = 'pekerjaan';
    }

    function index(Request $request){
        if ($request->ajax()) {
          
            if (auth('admin')->user()->level=="Admin") {
                $data = Pekerjaan::with('admin')->get();
            }else{
                $data = Pekerjaan::with('admin')->where('admin_id',auth('admin')->user()->id)->get();

            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('delete', function($row){
                        return  '<a href="javascript:void(0)" data-href="'.url('admin/pekerjaan/destroy/'.$row->uuid).'" onclick="deleteData(this)" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i>
                        </a>';
                    })
                    ->addColumn('action',function($row){
                        return  '<a href="'.url('admin/pekerjaan/show/'.$row->uuid).'" class="btn btn-sm btn-info">
                                    <i class="fas fa-pencil-alt"></i> 
                                </a>';
                    })
                
                    ->rawColumns(['delete','action'])
                    ->make(true);
        }
        return view('admin.pekerjaan.index');
    }

    function create(){
        return view('admin.pekerjaan._form');
    }

    function store(Request $request){

        $data['uuid'] = Str::uuid()->toString();
        $data['admin_id'] = auth('admin')->user()->id;
        $data['nama_perusahaan'] = $request['nama_perusahaan'];
        $data['posisi_terakhir'] = $request['posisi_terakhir'];
        $data['pendapatan_terakhir'] = $request['pendapatan_terakhir'];
      
        $data['tahun'] = $request['tahun'];
       
     
        try {
            Pekerjaan::insert($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => 'pekerjaan'
        ]);
    }

    function show(Pekerjaan $pekerjaan){
        $prefix = [ 'title' => 'Management Admin','menu' => 'Admin','active' => 'Update Admin'];
        return view('admin.pekerjaan._form',compact('pekerjaan','prefix'));
    }

    function update(Request $request){
        $uuid = $request['uuid'];
    
        $data['nama_perusahaan'] = $request['nama_perusahaan'];
        $data['posisi_terakhir'] = $request['posisi_terakhir'];
        $data['pendapatan_terakhir'] = $request['pendapatan_terakhir'];
      
        $data['tahun'] = $request['tahun'];
     
        try {
            Pekerjaan::where('uuid',$uuid)->update($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "pekerjaan"
        ]);
    }

   

    function destroy($uuid){
        $pekerjaan = Pekerjaan::find($uuid);
        try {
           
            $pekerjaan->delete();
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "pekerjaan"
        ]);
    }
}
