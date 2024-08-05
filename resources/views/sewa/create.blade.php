@extends('template.app')

@section('content')
<div class="section-header">
  <h1>Tambah Sewa</h1> <!-- Ganti judul halaman -->
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
        <form action="{{ route('sewa.store') }}" method="POST"> <!-- Ganti route -->
          @csrf
          <div class="form-group">
            <label for="exampleInputName">Nama Sewa</label> <!-- Ganti label -->
            <input type="text" name="nama_sewa" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter name"> <!-- Ganti name dan placeholder -->
            <small id="nameHelp" class="form-text text-muted">Nama sewa yang akan ditambahkan.</small>
            @error('nama_sewa')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputDetails">Details</label> <!-- Ganti label jika ada kolom lain -->
            <input type="text" name="details" class="form-control" id="exampleInputDetails" aria-describedby="detailsHelp" placeholder="Enter details"> <!-- Ganti name dan placeholder jika ada -->
            <small id="detailsHelp" class="form-text text-muted">Detail tambahan untuk sewa.</small>
            @error('details')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <br />
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button> <!-- Ganti button text -->
          </div>
        </form>
        {{-- {{ $user->links() }} --}}
      </div>
    </div>
  </div>
</div>
@endsection
