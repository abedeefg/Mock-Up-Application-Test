@extends('admin.app')
@section('content')

@include('admin.parts.breadcrumb')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <a href="{{route('create-biodata')}}" class="btn btn-primary"><i class="fas fa-newspaper"></i> Lengkapi Biodata</a>
                        </div>
                        <div>
                            <h3 class="mb-0">Biodata Diri</h3>
                        </div>
                    </div>
                </div>

                <table id="example" class="table w-100 nowrap">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Posisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->


@push('script')
    <script>
        $(document).ready(function(){
            var table = $(".table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('biodata') }}",
                columns: [
                    {   data: 'DT_RowIndex',    name:'DT_RowIndex'},
                    {   data: 'nama',          name: 'nama'},
                    {   data: 'tempat_lahir',          name: 'tempat_lahir'},
                    {   data: 'tanggal_lahir',          name: 'tanggal_lahir'},
                    {   data: 'posisi',          name: 'posisi'},
                    {   data: "action",
                            render: function ( data, type, row ) {
                                return  row.action
                            }
                    }
                
                ]
            });
        });
    </script>
@endpush
@endsection