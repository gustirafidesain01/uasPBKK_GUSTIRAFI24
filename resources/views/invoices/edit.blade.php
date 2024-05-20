@extends('layouts.app')

@section('content')
    <h1>Edit Invoice</h1>
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_penyewa">ID Penyewa:</label>
        <input type="text" name="id_penyewa" value="{{ $invoice->id_penyewa }}" required>
        <br>
        <label for="id_sewa">ID Sewa:</label>
        <input type="text" name="id_sewa" value="{{ $invoice->id_sewa }}" required>
        <br>
        <label for="id_kwitansi">ID Kwitansi:</label>
        <input type="text" name="id_kwitansi" value="{{ $invoice->id_kwitansi }}" required>
        <br>
        <button type="submit">Update Invoice</button>
    </form>
@endsection
