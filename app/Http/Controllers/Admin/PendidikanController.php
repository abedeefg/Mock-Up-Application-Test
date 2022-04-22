<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Models\Pendidikan;
use DataTables,Hash;
class PendidikanController extends Controller
{
    private  $routeIndex;        
    private  $nameFolder;        
    public function __construct(){
        $this->routeIndex = 'pendidikan';
        $this->nameFolder = 'pendidikan';
    }

    function index(Request $request){
        if ($request->ajax()) {
          
            if (auth('admin')->user()->level=="Admin") {
                $data = Pendidikan::all();
            }else{
                $data = Pendidikan::with('admin')->where('admin_id',auth('admin')->user()->id)->get();

            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('delete', function($row){
                        return  '<a href="javascript:void(0)" data-href="'.url('admin/pendidikan/destroy/'.$row->uuid).'" onclick="deleteData(this)" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i>
                        </a>';
                    })
                    ->addColumn('action',function($row){
                        return  '<a href="'.url('admin/pendidikan/show/'.$row->uuid).'" class="btn btn-sm btn-info">
                                    <i class="fas fa-pencil-alt"></i> 
                                </a>';
                    })
                
                    ->rawColumns(['delete','action'])
                    ->make(true);
        }
        return view('admin.pendidikan.index');
    }

    function create(){
        return view('admin.pendidikan._form');
    }

    function store(Request $request){

        $data['uuid'] = Str::uuid()->toString();
        $data['admin_id'] = auth('admin')->user()->id;
        $data['jenjang_pendidikan_terakhir'] = $request['jenjang_pendidikan_terakhir'];
        $data['nama_institusi'] = $request['nama_institusi'];
      
        $data['jurusan'] = $request['jurusan'];
        $data['tahun_lulus'] = $request['tahun_lulus'];
        $data['ipk'] = $request['ipk'];
        
        try {
            Pendidikan::create($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => 'pendidikan'
        ]);
    }

    function show(Pendidikan $pendidikan){
        $prefix = [ 'title' => 'Management Admin','menu' => 'Admin','active' => 'Update Admin'];
        return view('admin.pendidikan._form',compact('pendidikan','prefix'));
    }

    function update(Request $request){
        $uuid = $request['uuid'];
        $data['jenjang_pendidikan_terakhir'] = $request['jenjang_pendidikan_terakhir'];
        $data['nama_institusi'] = $request['nama_institusi'];
      
        $data['jurusan'] = $request['jurusan'];
        $data['tahun_lulus'] = $request['tahun_lulus'];
        $data['ipk'] = $request['ipk'];

        try {
            Pendidikan::where('uuid',$uuid)->update($data);
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "pendidikan"
        ]);
    }

   

    function destroy($uuid){
        $pendidikan = Pendidikan::find($uuid);
        try {
           
            $pendidikan->delete();
            $message = 'successfully';
        } catch (\Exception $exception){
            $message = $exception->getMessage();
        }
        return response()->json([
            'message' => $message,
            'route' => "pendidikan"
        ]);
    }
}
