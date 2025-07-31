@extends('adminlte::page')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Film</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="judul" type="judul" class="form-control @error('judul') is-invalid @enderror"
                    name="judul" value="{{ old('judul') }}" autocomplete="judul">
                @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ringkasan">Ringkasan</label>
                <textarea class="form-control" name="ringkasan" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input id="tahun" type="number" class="form-control @error('tahun') is-invalid @enderror"
                    name="tahun" value="{{ old('tahun') }}" autocomplete="tahun">
                @error('tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="poster">Poster</label>
                <input id="poster" type="file" class="form-control-file @error('poster') is-invalid @enderror"
                    name="poster" value="{{ old('poster') }}" autocomplete="poster">
                @error('poster')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" class="form-control @error('genre') is-invalid @enderror" name="genre">
                    <option value="">Pilih Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <a href="{{ route('film') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
