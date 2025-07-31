@extends('adminlte::page')

@section('content_header')
    <h1>Daftar Cast</h1>
    <p>Selamat datang di halaman daftar cast!</p>
    <a data-toggle="modal" data-target="#modalTambahCast" class="btn btn-success mb-3">+ Tambah Cast</a>
@endsection

{{-- content --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Bio</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($casts as $cast)
                        <tr>
                            <td>{{ $cast->id }}</td>
                            <td>{{ $cast->name }}</td>
                            <td>{{ $cast->umur }}</td>
                            <td>{{ $cast->bio }}</td>
                            <td>
                                <a data-toggle="modal" data-target="#modalEditCast" class="btn btn-warning"
                                    data-id="{{ $cast->id }}" data-name="{{ $cast->name }}"
                                    data-umur="{{ $cast->umur }}" data-bio="{{ $cast->bio }}">Edit</a>
                                <form action="{{ route('deleteCast', $cast->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Insert Form Pop Up -->
            <div class="modal fade" id="modalTambahCast" tabindex="-1" role="dialog"
                aria-labelledby="modalTambahCastLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('add') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahCastLabel">Tambah Cast</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input id="name" type="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input id="umur" type="number"
                                        class="form-control @error('umur') is-invalid @enderror" name="umur"
                                        value="{{ old('umur') }}" required autocomplete="umur">
                                    @error('umur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea class="form-control" name="bio" rows="3" required></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Edit Form Pop Up --}}
            <div class="modal fade" id="modalEditCast" tabindex="-1" role="dialog" aria-labelledby="modalEditCastLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" id="editCastForm">
                        @csrf
                        @method('PATCH')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditCastLabel">Edit Cast</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input id="name" type="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name" required
                                        autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input id="umur" type="number"
                                        class="form-control @error('umur') is-invalid @enderror" name="umur" required
                                        autocomplete="umur">
                                    @error('umur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea class="form-control" name="bio" rows="3" required id="bio"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#modalEditCast').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let name = button.data('name');
            let umur = button.data('umur');
            let bio = button.data('bio');

            let modal = $(this);
            // modal.find('#id').val(id);
            modal.find('#name').val(name);
            modal.find('#umur').val(umur);
            modal.find('#bio').val(bio);

            // Update form action URL
            let actionUrl = "{{ route('editCast', ':id') }}".replace(':id', id);
            $('#editCastForm').attr('action', actionUrl);
        });
    </script>
@stop
