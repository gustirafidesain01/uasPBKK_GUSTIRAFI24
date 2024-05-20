<!-- resources/views/invoices/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Invoice #{{ $invoice->id }}</h1>
    <p>ID Penyewa: {{ $invoice->id_penyewa }}</p>
    <p>ID Sewa: {{ $invoice->id_sewa }}</p>
    <p>ID Kwitansi: {{ $invoice->id_kwitansi }}</p>
    <a href="{{ route('invoices.edit', $invoice->id) }}">Edit</a>
    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
    <a href="{{ route('invoices.index') }}">Kembali ke Daftar Invoice</a>
@endsection

