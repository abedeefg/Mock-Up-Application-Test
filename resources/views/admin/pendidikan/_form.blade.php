@extends('admin.app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Management Pendidikan</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{empty($pendidikan) ? route('storePendidikan') : route('updatePendidikan')}}" id="{{empty($pendidikan) ? 'form-insert' : 'form-update'}}" method="post">
                            @csrf
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Pendidikan Terakhir </label>
                                <div class="col-md-9">
                                    <input id="jenjang_pendidikan_terakhir" name="jenjang_pendidikan_terakhir" value="{{$pendidikan['jenjang_pendidikan_terakhir'] ?? ''}}" class="form-control" placeholder="Enter Pendidikan Terakhir"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Nama Institusi</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="nama_institusi" class="form-control" value="{{$pendidikan['nama_institusi'] ?? ''}}" placeholder="Enter Nama Institusi"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Jurusan</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="jurusan" class="form-control" value="{{$pendidikan['jurusan'] ?? ''}}" placeholder="Enter Jurusan"
                                        type="text">
                                </div>
                            </div>
                            
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Tahun Lulus</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="tahun_lulus" id="">
                                        <option value="">--Pilih--</option>
                                        <option {{!empty($pendidikan) ? $pendidikan['tahun_lulus']=="2020" ? 'selected' : '' : ''}} value="2020">2020</option>
                                        <option {{!empty($pendidikan) ? $pendidikan['tahun_lulus']=="2021" ? 'selected' : '' : ''}} value="2021">2021</option>
                                        <option {{!empty($pendidikan) ? $pendidikan['tahun_lulus']=="2022" ? 'selected' : '' : ''}} value="2022">2022</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">IPK</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="ipk" class="form-control" value="{{$pendidikan['ipk'] ?? ''}}" placeholder="Enter IPK"
                                        type="text">
                                </div>
                            </div>                    
                    
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="status"></label>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp;
                                <a href="{{route('pendidikan')}}" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div><!-- end row-->

@endsection
