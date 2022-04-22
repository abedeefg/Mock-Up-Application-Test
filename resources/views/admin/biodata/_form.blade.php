@extends('admin.app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Management Biodata </h4>
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
                        <form action="{{route('updateBiodata')}}" id="form-update" method="post">
                            
                            @csrf
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Posisi </label>
                                <div class="col-md-9">
                                    {{-- <input id="posisi" name="posisi" value="{{$biodata['posisi'] ?? ''}}" class="form-control" placeholder="Enter Posisi"> --}}
                                    <select name="posisi" class="form-control" id="">
                                        <option value="">--Pilih--</option>
                                        <option {{!empty($biodata) ? $biodata['posisi']=="Frontend Developer" ? 'selected' : '' : ''}} value="Frontend Developer">Frontend Developer</option>
                                        <option {{!empty($biodata) ? $biodata['posisi']=="Backend Developer" ? 'selected' : '' : ''}} value="Backend Developer">Backend Developer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">No Ktp </label>
                                <div class="col-md-9">
                                    <input id="no_ktp" name="no_ktp" value="{{$biodata['no_ktp'] ?? ''}}" class="form-control" placeholder="Enter No KTP">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Nama Lengkap </label>
                                <div class="col-md-9">
                                    <input id="nama" name="nama" value="{{$biodata['nama'] ?? ''}}" class="form-control" placeholder="Enter Nama Lengkap">
                                    <input id="admin_id" name="admin_id" value="{{auth('admin')->user()->id}}" class="form-control" type="hidden">
                                    <input id="uuid" name="uuid" value="{{$biodata['uuid'] ?? ''}}" class="form-control" type="hidden">
                                </div>
                            </div>
                            <div class="form-group  row mb-3"> 
                                <label class="col-3 col-form-label" for="fullname">Tempat Lahir </label>
                                <div class="col-md-9">
                                    <input id="tempat_lahir" name="tempat_lahir" value="{{$biodata['tempat_lahir'] ?? ''}}" class="form-control" placeholder="Enter Tempat Lahir">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Tanggal Lahir </label>
                                <div class="col-md-9">
                                    <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{$biodata['tanggal_lahir'] ?? ''}}" class="form-control" placeholder="Enter Tanggal Lahir">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Jenis Kelamin </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="jenis_kelamin" id="">
                                        <option value="">--Pilih--</option>
                                        <option {{!empty($biodata) ? $biodata['jenis_kelamin']=="Laki-laki" ? 'selected' : '' : ''}} value="Laki-laki">Laki-laki</option>
                                        <option  {{!empty($biodata) ? $biodata['jenis_kelamin']=="Perempuan" ? 'selected' : '' : ''}} value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Agama </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="agama" id="">
                                        <option value="">--Pilih--</option>
                                        <option  {{!empty($biodata) ? $biodata['agama']=="Islam" ? 'selected' : '' : ''}} value="Islam">Islam</option>
                                        <option  {{!empty($biodata) ? $biodata['agama']=="Kristen" ? 'selected' : '' : ''}} value="Kristen">Kristen</option>
                                        <option  {{!empty($biodata) ? $biodata['agama']=="Hindu" ? 'selected' : '' : ''}} value="Hindu">Hindu</option>
                                        <option  {{!empty($biodata) ? $biodata['agama']=="Buddha" ? 'selected' : '' : ''}} value="Buddha">Buddha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Golongan Darah </label>
                                <div class="col-md-9">
                                    <input id="golongan_darah" type="text" name="golongan_darah" value="{{$biodata['golongan_darah'] ?? ''}}" class="form-control" placeholder="Enter Golongan Darah">
                                </div>
                            </div>

                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Status </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status" id="">
                                        <option value="">--Pilih--</option>
                                        <option  {{!empty($biodata) ? $biodata['status']=="Menikah" ? 'selected' : '' : ''}} value="Menikah">Menikah</option>
                                        <option  {{!empty($biodata) ? $biodata['status']=="Belum Menikah" ? 'selected' : '' : ''}} value="Belum Menikah">Belum Menikah</option>
                                        <option  {{!empty($biodata) ? $biodata['status']=="Cerai" ? 'selected' : '' : ''}} value="Cerai">Cerai</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Alamat KTP</label>
                                <div class="col-md-9">
                                    <textarea name="alamat_ktp" id="alamat_ktp" class="form-control">{{$biodata['alamat_ktp'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Alamat Tinggal</label>
                                <div class="col-md-9">
                                    <textarea name="alamat_tinggal" id="alamat_tinggal" class="form-control">{{$biodata['alamat_tinggal'] ?? ''}}</textarea>
                                </div>
                            </div>

                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Email</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="email" class="form-control" value="{{$biodata['email'] ?? ''}}" placeholder="Enter email"
                                        type="email">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">No Telepon</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="no_telp" class="form-control" value="{{$biodata['no_telp'] ?? ''}}" placeholder="Enter No Telepon"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">No Telepon Orang Terdekat</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="no_telp_orang_terdekat" class="form-control" value="{{$biodata['no_telp_orang_terdekat'] ?? ''}}" placeholder="Enter No Telepon Orang Terdekat"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Skill</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="skill" class="form-control" value="{{$biodata['skill'] ?? ''}}" placeholder="Enter Skill"
                                        type="text">
                                </div>
                            </div>
                            
                           

                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Bersedia di Tempatkan di Seluruh Kantor Perusahaan  </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="bersedia" id="">
                                        <option value="">--Pilih--</option>
                                        <option  {{!empty($biodata) ? $biodata['bersedia']=="Ya" ? 'selected' : '' : ''}} value="Ya">Iya</option>
                                        <option  {{!empty($biodata) ? $biodata['bersedia']=="Tidak" ? 'selected' : '' : ''}} value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Penghasilan</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="penghasilan" class="form-control" value="{{$biodata['penghasilan'] ?? ''}}" placeholder="Enter Penghasilan"
                                        type="text">
                                </div>
                            </div>
                            {{-- <div class="form-group  row mb-3 ">
                                <label class="col-3 col-form-label" for="status">Status</label>
                                <div class="col-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="1" name="status" id="aktif">
                                        <label class="custom-control-label" for="aktif">Active</label>

                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="0" name="status" id="tidak">
                                        <label class="custom-control-label" for="tidak">Deactive</label>
                                    </div>
                                   
                                </div>
                            </div> --}}
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="status"></label>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp;
                                <a href="{{route('biodata')}}" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div><!-- end row-->

@endsection
