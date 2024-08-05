@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Penyewa</h1>
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
                <a href="{{ route('penyewa.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kwitansi</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Penyewa</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nama Kwitansi</th>
                        <th scope="col" style="width: 20%">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penyewa as $index => $data_penyewa)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{ $data_penyewa->kwitansi }}</td>
                        <td>{{ $data_penyewa->user->email }}</td>
                        <td>{{ $data_penyewa->nama_penyewa }}</td>
                        <td>{{ $data_penyewa->jenis_kelamin }}</td>
                        <td>{{ $data_penyewa->kwitansi->no_kwitansi }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penyewa.destroy', $data_penyewa->id) }}" method="POST">
                                <a href="{{ route('penyewa.show', $data_penyewa->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('penyewa.edit', $data_penyewa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Penyewa Belum Ada.
                    </div>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $penyewa->links() }} --}}
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
