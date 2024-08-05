@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Edit Kwitansi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-0">
                <form action="{{ route('kwitansi.update', $dataKwitansi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputNomor">Nomor Kwitansi</label>
                        <input type="text" name="nomor_kwitansi" class="form-control" id="exampleInputNomor" placeholder="Enter nomor kwitansi" value="{{ old('nomor_kwitansi', $dataKwitansi->nomor_kwitansi) }}">
                        @error('nomor_kwitansi')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputTanggal" value="{{ old('tanggal', $dataKwitansi->tanggal->format('Y-m-d')) }}">
                        @error('tanggal')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJumlah">Jumlah</label>
                        <input type="number" step="0.01" name="jumlah" class="form-control" id="exampleInputJumlah" placeholder="Enter jumlah" value="{{ old('jumlah', $dataKwitansi->jumlah) }}">
                        @error('jumlah')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <br />
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
