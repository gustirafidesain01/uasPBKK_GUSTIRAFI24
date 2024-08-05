@extends('template.app')
@section('content')
<div class="section-header">
  <h1>Tambah Invoice</h1>
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
        <form action="{{ route('invoices.store') }}" method="POST">
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
            <label for="invoice_number">Invoice Number</label>
            <input type="text" name="invoice_number" class="form-control" id="invoice_number" placeholder="Enter invoice number">
            <small class="form-text text-muted">Masukkan nomor invoice, contoh: INV-2024-001.</small>
            @error('invoice_number')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="invoice_date">Invoice Date</label>
            <input type="date" name="invoice_date" class="form-control" id="invoice_date" placeholder="Enter invoice date">
            <small class="form-text text-muted">Masukkan tanggal invoice, contoh: 2024-08-01.</small>
            @error('invoice_date')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount">
            <small class="form-text text-muted">Masukkan jumlah invoice, contoh: 500000.</small>
            @error('amount')
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
        {{-- {{ $user->links() }} --}}
      </div>
    </div>
  </div>
</div>
@endsection
