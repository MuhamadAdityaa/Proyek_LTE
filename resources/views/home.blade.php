{{-- @extends('layouts.app') --}}

@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <x-adminlte-card title="Statistik" theme="info" icon="fas fa-chart-bar">
                Ini konten box 1
            </x-adminlte-card>
        </div>
        <div class="col-md-4">
            <x-adminlte-card title="Pengguna" theme="success" icon="fas fa-users">
                Ini konten box 2
            </x-adminlte-card>
        </div>
    </div>
@endsection
