@extends('admin.app')
@section('content')

{{-- @include('admin.includes.breadcrumb') --}}

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('updatePassword')}}"  enctype="multipart/form-data" id="form-update" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="old-password">Password Old</label>
                                <input id="old-password" name="oldPassword" class="form-control"
                                    placeholder="Enter Password Old" type="password">
                                <input id="uuid" name="uuid" value="{{$admin->uuid}}" class="form-control" type="hidden">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="new-password">Password</label>
                                <input id="new-password" name="newPassword" class="form-control"
                                    placeholder="Enter New Password" type="password">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="ulangi-repassword">Repeat Password</label>
                                <input id="ulangi-repassword" name="rePassword" class="form-control"
                                    placeholder="Repeat Password" type="password">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                    <a href="{{route('admin')}}" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->


@endsection