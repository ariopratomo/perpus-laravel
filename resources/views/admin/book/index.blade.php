@extends('admin.template.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Buku</h3>
        <a href="{{ route('admin.book.create') }}" class="btn btn-primary mx-2">Tambah Buku</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <span id="notify"></span>
        {{-- @include('admin.template.partials.alerts') --}}

        <table id="tableex" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Buku</th>
                    <th>Penulis</th>
                    <th>Sampul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>

<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display: none">
</form>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bs-notify.js') }}"></script>
<script>
    $(function () {
            $('#tableex').DataTable({
                processing: true,
                serverSide: true,
                ajax:'{{ route('admin.book.data') }}',
                columns:[
                    {data: 'DT_RowIndex', orderable:false, searchable:false},
                    {data: 'title'},
                    {data: 'description'},
                    {data: 'qty'},
                    {data: 'author'},
                    {data: 'cover'},
                    {data: 'action'},
                ]
            });
        });
</script>

@include('admin.template.partials.alerts')
@endpush
