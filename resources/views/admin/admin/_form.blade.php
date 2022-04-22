@extends('admin.app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Management Admin</h4>
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
                        <form action="{{empty($admin) ? route('storeAdmin') : route('updateAdmin')}}" id="{{empty($admin) ? 'form-insert' : 'form-update'}}" method="post">
                            @csrf
                            @csrf
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="fullname">Nama Lengkap </label>
                                <div class="col-md-9">
                                    <input id="nama_lengkap" name="nama_lengkap" value="{{$admin['nama_lengkap'] ?? ''}}" class="form-control" placeholder="Enter Nama Lengkap"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="input-email">Email</label>
                                <div class="col-md-9">
                                    <input id="input-email" name="email" class="form-control" value="{{$admin['email'] ?? ''}}" placeholder="Enter email"
                                        type="email">
                                </div>
                            </div>
                                                    
                            @if (empty($admin) ?? null )
                                <div class="form-group  row mb-3">
                                    <label class="col-3 col-form-label" for="input-password">Password</label>
                                    <div class="col-md-9">
                                        <input id="input-password" name="password" class="form-control"
                                        placeholder="Enter password" type="password">

                                    </div>
                                </div>
                                <div class="form-group  row mb-3">
                                    <label class="col-3 col-form-label" for="input-repassword">Repeat Password</label>
                                    <div class="col-md-9">
                                        <input id="input-repassword" name="repassword" class="form-control"
                                        placeholder="Enter repassword" type="password">

                                    </div>
                                </div>
                            @endif
                            <div class="form-group  row mb-3 ">
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
                            </div>
                            <div class="form-group  row mb-3">
                                <label class="col-3 col-form-label" for="status"></label>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp;
                                <a href="{{route('admin')}}" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div><!-- end row-->

@endsection
