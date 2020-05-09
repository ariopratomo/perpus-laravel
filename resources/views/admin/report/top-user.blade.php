@extends('admin.template.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Laporan User Teraktif</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <span id="notify"></span>
        {{-- @include('admin.template.partials.alerts') --}}

        <table id="tableex" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jumlah Peminjaman</th>
                    <th>Bergabung</th>
                </tr>
            </thead>
            <tbody>
                @php
                $page = 1;
                if (request()->has('page')) {
                $page = request('page');
                }
                $no = (env('PAGINATION_ADMIN') * $page) - (env('PAGINATION_ADMIN')-1);
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->borrow_count }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
        {{ $users->links() }}
    </div>

    <!-- /.card-body -->
</div>

<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display: none">
</form>

@endsection
