<!-- resources/views/invoices/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Invoices</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Tambah Invoice</a>
    <ul>
        @foreach ($invoices as $invoice)
            <li>
                <a href="{{ route('invoices.show', $invoice->id) }}">
                    Invoice #{{ $invoice->id }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
