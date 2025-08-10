@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('film') }}" class="btn btn-secondary mb-3">
        ← Kembali ke Daftar Film
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card p-4 shadow" style="min-height: 70vh">
                    <h3 class="mb-4">Detail Film</h3>
                    <div class="row">
                        {{-- Poster --}}
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('storage/' . $film->poster) }}" alt="Poster Film"
                                class="img-fluid rounded shadow-sm">
                        </div>

                        {{-- Detail --}}
                        <div class="col-md-8">
                            <h4 class="mb-3">{{ $film->judul }}</h4>
                            <p><strong>Tahun:</strong>{{ $film->tahun }}</p>
                            <p><strong>Genre:</strong>{{ $film->genre->name }}</p>
                            <p><strong>Pemeran:</strong>
                            @foreach ($film->perans as $peran)
                                <span class="badge bg-primary"> {{ $peran->cast->name }} sebagai
                                    {{ $peran->nama}}</span>
                                
                            @endforeach
                            </p>
                            <p><strong>Ringkasan:</strong><br>{{ $film->ringkasan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
