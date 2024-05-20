<!-- resources/views/invoices/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Invoice</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <label for="id_penyewa">ID Penyewa:</label>
        <input type="text" name="id_penyewa" required>
        <br>
        <label for="id_sewa">ID Sewa:</label>
        <input type="text" name="id_sewa" required>
        <br>
        <label for="id_kwitansi">ID Kwitansi:</label>
        <input type="text" name="id_kwitansi" required>
        <br>
        <button type="submit">Tambah Invoice</button>
    </form>
@endsection
