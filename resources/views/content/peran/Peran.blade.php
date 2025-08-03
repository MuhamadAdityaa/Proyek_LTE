@extends('adminlte::page')

@section('content_header')
    <h1>Daftar Peran</h1>
    <p>Selamat datang di halaman daftar peran!</p>
@endsection

@section('content')
    <div class="container mt-5">

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

        <form action="{{ route('film.create.peran') }}" method="POST" enctype="multipart/form-data"
            value="{{ $film->id }}">
            {{-- Tambahkan token CSRF untuk keamanan --}}
            @csrf

            <div class="form-group">
                <label for="film">Film</label>

                {{-- Ini yang dikirim ke backend --}}
                <input type="hidden" name="film" value="{{ $film->id }}">

                {{-- Ini hanya tampilan ke user --}}
                <input type="text" class="form-control" value="{{ $film->judul }}" readonly>
            </div>

            <div class="form-group">
                <label for="peran">Nama Peran</label>
                <input id="peran" type="peran" class="form-control @error('peran') is-invalid @enderror"
                    name="peran" value="{{ old('peran') }}" autocomplete="peran">
                @error('peran')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cast">Pemeran</label>
                <select id="cast" class="form-control @error('cast') is-invalid @enderror" name="cast">
                    <option value="">Pemeran</option>
                    @foreach ($casts as $cast)
                        <option value="{{ $cast->id }}">{{ $cast->name }}</option>
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
