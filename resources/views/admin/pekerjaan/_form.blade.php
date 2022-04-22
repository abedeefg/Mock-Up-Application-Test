@extends('admin.app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Management Pekerjaan</h4>
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
                        <form action="{{empty($pekerjaan) ? route('storePekerjaan') : route('updatePekerjaan')}}" id="{{empty($pekerjaan) ? 'form-insert' : 'form-update'}}" method="post">
                            @csrf
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Nama Perusahaan </label>
                                <div class="col-md-9">
                                    <input id="nama_perusahaan" name="nama_perusahaan" value="{{$pekerjaan['nama_perusahaan'] ?? ''}}" class="form-control" placeholder="Enter Nama Perusahaan"
                                        type="text">
                                    <input id="uuid" name="uuid" value="{{$pekerjaan['uuid'] ?? ''}}" class="form-control" type="hidden">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Posisi</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="posisi_terakhir" class="form-control" value="{{$pekerjaan['posisi_terakhir'] ?? ''}}" placeholder="Enter Nama Posisi"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Pendapatan</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="pendapatan_terakhir" class="form-control" value="{{$pekerjaan['pendapatan_terakhir'] ?? ''}}" placeholder="Enter pendapatan terakhir"
                                        type="text">
                                </div>
                            </div>
                            
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Tahun </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="tahun" id="">
                                        <option value="">--Pilih--</option>
                                        <option {{!empty($pekerjaan) ? $pekerjaan['tahun']=="2020" ? 'selected' : '' : ''}} value="2020">2020</option>
                                        <option {{!empty($pekerjaan) ? $pekerjaan['tahun']=="2021" ? 'selected' : '' : ''}} value="2021">2021</option>
                                        <option {{!empty($pekerjaan) ? $pekerjaan['tahun']=="2022" ? 'selected' : '' : ''}} value="2022">2022</option>
                                    </select>
                                </div>
                            </div>
                                             
                    
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="status"></label>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp;
                                <a href="{{route('pekerjaan')}}" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div><!-- end row-->

@endsection
