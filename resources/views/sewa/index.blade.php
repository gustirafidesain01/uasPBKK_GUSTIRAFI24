@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Halaman Sewa</h1> <!-- Ganti judul halaman -->
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
                <a href="{{ route('sewa.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a> <!-- Ganti route -->
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Sewa</th> <!-- Ganti nama kolom -->
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                        @forelse ($dataSewa as $index => $sewa) <!-- Ganti dataMatakuliah dan matakuliah -->
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $sewa->nama_sewa }}</td> <!-- Ganti nama_matakuliah -->
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sewa.destroy', $sewa->id) }}" method="POST"> <!-- Ganti route -->
                                    <a href="{{ route('sewa.show', $sewa->id) }}" class="btn btn-sm btn-dark">SHOW</a> <!-- Ganti route -->
                                    <a href="{{ route('sewa.edit', $sewa->id) }}" class="btn btn-sm btn-primary">EDIT</a> <!-- Ganti route -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">Data Sewa Belum Ada.</div> <!-- Ganti pesan -->
                        @endforelse
                    </table>
                    {{-- {{ $user->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
