@extends('template.app')
@section('content')
<div class="section-header">
  <h1>Edit Invoice</h1>
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
        <form action="{{ route('invoices.update', $invoice->invoice_number) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="exampleFormControlSelect1">Username</label>
            <select class="form-control" name="user_id" id="exampleFormControlSelect1">
              @foreach ($user as $data_user)
              <option value="{{ $data_user->id }}" {{ $data_user->id == $invoice->user_id ? 'selected' : '' }}>{{ $data_user->email }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="invoice_number">Invoice Number</label>
            <input type="text" name="invoice_number" class="form-control" id="invoice_number" value="{{ old('invoice_number', $invoice->invoice_number) }}">
            @error('invoice_number')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="invoice_date">Invoice Date</label>
            <input type="date" name="invoice_date" class="form-control" id="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date) }}">
            @error('invoice_date')
            <div class="alert alert-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" id="amount" value="{{ old('amount', $invoice->amount) }}">
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
      </div>
    </div>
  </div>
</div>
@endsection
