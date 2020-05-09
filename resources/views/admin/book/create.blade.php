@extends('admin.template.default')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Buku</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Masukan Judul Buku" value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    placeholder="Tuliskan Deskripsi Buku" rows="3">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Penulis</label>
                <select class="form-control select2 @error('description') is-invalid @enderror" name="author_id">
                    @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
                @error('author_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="">Jumlah</label>
                <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror"
                    placeholder="Masukan Jumlah Buku" value="{{ old('qty') }}">
                @error('qty')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="">Sampul</label>
                <input type="file" name="cover" class="form-control-file @error('cover') is-invalid @enderror"
                    placeholder="Masukan Judul Buku" value="{{ old('cover') }}">
                @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection
@push('select2css')
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
--}}
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

@endpush
@push('scripts')
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $('.select2').select2()
</script>
@endpush
