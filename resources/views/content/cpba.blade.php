@extends('adminlte::page')

@section('content')
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <h5 class="modal-title mb-3">Tambah Film</h5>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="mb-3 col">
                        <img src="{{ asset('storage/posters/1748935532.jpg') }}" alt="Poster" class="img-fluid mb-3"
                            style="max-width: 100%; height: auto;">
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
    </div>
@endsection
