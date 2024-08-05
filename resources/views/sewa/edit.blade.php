@extends('template.app')

@section('content')
<div class="section-header">
  <h1>Edit Sewa</h1> <!-- Ganti judul halaman -->
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
        <form action="{{ route('sewa.update', $sewa->id) }}" method="POST"> <!-- Ganti route dan variabel -->
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="exampleInputName">Nama Sewa</label> <!-- Ganti label -->
            <input type="text" name="nama_sewa" class="form-control" id="exampleInputName" placeholder="Enter name" value="{{ old('nama_sewa', $sewa->nama_sewa) }}"> <!-- Ganti name dan value -->
            @error('nama_sewa')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputDetails">Details</label> <!-- Ganti label jika ada kolom lain -->
            <input type="text" name="details" class="form-control" id="exampleInputDetails" placeholder="Enter details" value="{{ old('details', $sewa->details) }}"> <!-- Ganti name dan value jika ada -->
            @error('details')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <br />
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        {{-- {{ $user->links() }} --}}
      </div>
    </div>
  </div>
</div>
@endsection
