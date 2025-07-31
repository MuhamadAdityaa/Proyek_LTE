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
                        <th>Ringkasan</th>
                        <th>Tahun</th>
                        <th>Poster</th>
                        <th>Genre</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <td>{{ $film->id }}</td>
                            <td>{{ $film->judul }}</td>
                            <td>{{ $film->ringkasan }}</td>
                            <td>{{ $film->tahun }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $film->poster) }}" alt="Poster"
                                    style="width: 100px; height: auto;">
                            </td>
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
                                <button type="button" class="btn btn-info btn-detail" data-toggle="modal"
                                    data-target="#detailModal">Detail</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Modal --}}
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="filmModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Tambah Film</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body
                        <form action="{{ route('film.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="mb-3 col">
                                    <img src="{{ asset('storage/posters/1748935532.jpg') }}" alt="Poster"
                                        class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                                </div>

                                <div class=col>
                                    <div class="mb-3 row">
                                        <div><strong>Judul:</strong> semut</div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div><strong>Tahun:</strong>2020</div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div><strong>Genre:</strong>Action</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="ringkasan" class="form-label">Ringkasan</label>
                                <div class="">awodkoadkowakdoawkdoawkd</div>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('.btn-detail').on('click', function () {
        var filmId = $(this).data('id');

        $.ajax({
            url: '/films/' + filmId,
            method: 'GET',
            success: function (data) {
                $('#filmDetailContent').html(data);
                $('#detailModal').modal('show');
            },
            error: function () {
                alert('Gagal mengambil data film.');
            }
        });
    });
});
</script>
@endpush
