@extends('admin.template.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Laporan Buku Terlaris</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <span id="notify"></span>
        {{-- @include('admin.template.partials.alerts') --}}

        <table id="tableex" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Buku</th>
                    <th>Total Dipinjam</th>
                    <th>Penulis</th>
                    <th>Sampul</th>
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
                @foreach ($books as $book)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->qty }}</td>
                    <td>{{ $book->borrowed_count }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td><img src="{{ $book->getCover() }}" alt="{{ $book->title }}" height="160"></td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="mt-2">{{ $books->links() }}</div>

    </div>

    <!-- /.card-body -->
</div>

<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display: none">
</form>

@endsection
