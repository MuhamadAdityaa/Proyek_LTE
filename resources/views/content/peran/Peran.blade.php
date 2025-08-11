@extends('adminlte::page')

@section('content_header')
    <h1>Mendaftarkan Peran Pada Film : {{ $film->judul }}</h1>
    <p>Selamat datang di halaman daftar peran!</p>
@endsection

@section('content')
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('film.create.peran') }}" method="POST" enctype="multipart/form-data"
            value="{{ $film->id }}">
            {{-- Tambahkan token CSRF untuk keamanan --}}
            @csrf

            <div class="form-group">
                {{-- Ini yang dikirim ke backend --}}
                <input id="film" type="hidden" name="film" value="{{ $film->id }}">
            </div>

            <div class="form-group">
                <label for="peran">Nama Peran</label>
                <input id="peran" type="peran" class="form-control @error('peran') is-invalid @enderror"
                    name="peran" value="{{ old('peran') }}" autocomplete="peran">
                @error('peran')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cast">Pemeran</label>
                <select id="cast" class="form-control @error('cast') is-invalid @enderror" name="cast">
                    <option value="">-- Pilih Pemeran --</option>
                    @foreach ($casts as $cast)
                        <option value="{{ $cast->id }}" {{ old('cast') == $cast->id ? 'selected' : '' }}>{{ $cast->name }}</option>
                    @endforeach
                </select>
                @error('cast')
                    <span class="invalid-feedback" role="alert">
                        <div class="alert alert-danger">{{ $message }}</div>
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
