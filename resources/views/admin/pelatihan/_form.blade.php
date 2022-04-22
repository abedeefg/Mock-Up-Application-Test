@extends('admin.app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Management Riwayat Pelatihan</h4>
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
                        <form action="{{empty($pelatihan) ? route('storePelatihan') : route('updatePelatihan')}}" id="{{empty($pelatihan) ? 'form-insert' : 'form-update'}}" method="post">
                            @csrf
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Nama Pelatihan </label>
                                <div class="col-md-9">
                                    <input id="nama_pelatihan" name="nama_pelatihan" value="{{$pelatihan['nama_pelatihan'] ?? ''}}" class="form-control" placeholder="Enter Nama Pelatihan"
                                        type="text">
                                    <input id="uuid" name="uuid" value="{{$pelatihan['uuid'] ?? ''}}" class="form-control"
                                        type="hidden">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Sertifikat</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="sertifikat" id="">
                                        <option value="">--Pilih--</option>
                                        <option {{!empty($pelatihan) ? $pelatihan['sertifikat']=="Ada" ? 'selected' : '' : ''}} value="Ada">Ada</option>
                                        <option {{!empty($pelatihan) ? $pelatihan['sertifikat']=="Tidak Ada" ? 'selected' : '' : ''}} value="Tidak Ada">Tidak Ada</option>
                                
                                    </select>
                                </div>
                            </div>
                           
                            
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Tahun </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="tahun" id="">
                                        <option value="">--Pilih--</option>
                                        <option {{!empty($pelatihan) ? $pelatihan['tahun']=="2020" ? 'selected' : '' : ''}} value="2020">2020</option>
                                        <option {{!empty($pelatihan) ? $pelatihan['tahun']=="2021" ? 'selected' : '' : ''}} value="2021">2021</option>
                                        <option {{!empty($pelatihan) ? $pelatihan['tahun']=="2022" ? 'selected' : '' : ''}} value="2022">2022</option>
                                    </select>
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
