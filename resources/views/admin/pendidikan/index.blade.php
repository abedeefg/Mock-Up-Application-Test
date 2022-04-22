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
                            <a href="{{route('create-pendidikan')}}" class="btn btn-primary"><i class="fas fa-newspaper"></i> Tambah Jenjang Pendidikan</a>
                        </div>
                        <div>
                            <h3 class="mb-0">List Pendidikan</h3>
                        </div>
                    </div>
                </div>

                <table id="example" class="table w-100 nowrap">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenjang Pendidikan</th>
                            <th>Nama Institusi</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>IPK</th>
                           
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
                ajax: "{{ route('pendidikan') }}",
                columns: [
                    {   data: 'DT_RowIndex',    name:'DT_RowIndex'},
                    {   data: 'jenjang_pendidikan_terakhir',          name: 'jenjang_pendidikan_terakhir'},
                    {   data: 'nama_institusi',          name: 'nama_institusi'},
                    {   data: 'jurusan',          name: 'jurusan'},
                    {   data: 'tahun_lulus',          name: 'tahun_lulus'},
                    {   data: 'ipk',          name: 'ipk'},
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