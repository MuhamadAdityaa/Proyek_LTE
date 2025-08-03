@extends('adminlte::page')

@section('content_header')
    <h1>Daftar Film</h1>
    <p>Selamat datang di halaman daftar film!</p>
    <a href="{{ route('film.insert') }}" class="btn btn-success mb-3">+ Tambah film</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Genre</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <td>{{ $film->id }}</td>
                            <td>{{ $film->judul }}</td>
                            <td>{{ $film->tahun }}</td>
                            <td>{{ $film->genre->name }}</td>
                            <td>
                                <a href="{{ route('film.edit.show', $film->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('film.delete', $film->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-danger">Hapus</button>
                                </form>
                                <a href="{{ route('film.detail', $film->id) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('film.store.peran', $film->id) }}" class="btn btn-info">Peran</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
