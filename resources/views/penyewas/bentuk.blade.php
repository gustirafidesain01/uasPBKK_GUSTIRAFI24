@extends('layouts.app')

@section('content')
    <h1>Daftar Penyewa</h1>
    <ul>
        @foreach ($penyewas as $penyewa)
            <li>
                <a href="{{ route('penyewas.show', $penyewa->id) }}">
                    {{ $penyewa->nama }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
