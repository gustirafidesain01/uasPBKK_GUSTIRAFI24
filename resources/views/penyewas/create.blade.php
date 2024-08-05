@extends('template.app')
@section('content')
<div class="section-header">
  <h1>Tambah Penyewa</h1>
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
        <form action="{{ route('penyewa.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlSelect1">Email</label>
            <select class="form-control" name="user_id" id="exampleFormControlSelect1">
              @foreach ($user as $data_user)
              <option value="{{ $data_user->id }}">{{ $data_user->email }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Penyewa</label>
            <input type="text" name="nama_penyewa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nama penyewa">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('nama_penyewa')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Kwitansi</label>
            <input type="text" name="kwitansi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter kwitansi">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('kwitansi')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <br>
            <input class="form-control-input" value="L" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Laki-Laki
            </label>
            <input class="form-control-input" value="P" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Perempuan
            </label>
            @error('jenis_kelamin')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat Penyewa</label>
            <textarea class="form-control" name="alamat_penyewa" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('alamat_penyewa')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Nomor Kwitansi</label>
            <select class="form-control" name="kwitansi" id="exampleFormControlSelect1">
              @foreach ($kwitansi as $data_kwitansi)
              <option value="{{ $data_kwitansi->id }}">{{ $data_kwitansi->no_kwitansi }}</option>
              @endforeach
            </select>
          </div>
          <br />
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        {{-- {{ $user->links() }} --}}
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
