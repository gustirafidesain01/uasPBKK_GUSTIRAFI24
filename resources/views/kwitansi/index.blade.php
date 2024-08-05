@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Kwitansi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kwitansi.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Kwitansi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col" style="width: 20%">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataKwitansi as $index => $kwitansi)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{ $kwitansi->nomor_kwitansi }}</td>
                        <td>{{ $kwitansi->tanggal->format('d-m-Y') }}</td>
                        <td>{{ number_format($kwitansi->jumlah, 2) }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kwitansi.destroy', $kwitansi->id) }}" method="POST">
                                <a href="{{ route('kwitansi.show', $kwitansi->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('kwitansi.edit', $kwitansi->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data Kwitansi Belum Ada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $dataKwitansi->links() }} --}}
        </div>
    </div>
</div>
@endsection
