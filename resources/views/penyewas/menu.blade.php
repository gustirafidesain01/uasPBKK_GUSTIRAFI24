<!-- resources/views/penyewas/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Penyewa</h1>
    <p>Nama: {{ $penyewa->nama }}</p>
    <p>Alamat: {{ $penyewa->alamat }}</p>
    <p>no-hp: {{ $penyewa->no-hp }}</p>
    <p>tujuan: {{ $penyewa->tujuan }}</p>
    <p>date_time_set: {{ $penyewa->hari-penyewa }}</p>
@endsection
