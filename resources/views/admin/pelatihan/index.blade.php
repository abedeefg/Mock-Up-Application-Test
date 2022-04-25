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
                            <a href="{{route('create-pelatihan')}}" class="btn btn-primary"><i class="fas fa-newspaper"></i> Tambah Pelatihan</a>
                        </div>
                        <div>
                            <h3 class="mb-0">List Pelatihan</h3>
                        </div>
                    </div>
                </div>

                <table id="example" class="table w-100 nowrap">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Email</th>
                            <th>Nama Pelatihan</th>
                            <th>Sertifikat</th>
                            <th>Tahun</th>
                            
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
                ajax: "{{ route('pelatihan') }}",
                columns: [
                    {   data: 'DT_RowIndex',    name:'DT_RowIndex'},
                    {   data: 'admin.email',          name: 'admin.email'},
                    {   data: 'nama_pelatihan',          name: 'nama_pelatihan'},
                    {   data: 'sertifikat',          name: 'sertifikat'},
                    {   data: 'tahun',          name: 'tahun'},
                    {   data: "action.delete",
                            render: function ( data, type, row ) {
                                return  row.action +'&nbsp;' + row.delete
                            }
                    }
                
                ]
            });
        });
    </script>
@endpush
@endsection