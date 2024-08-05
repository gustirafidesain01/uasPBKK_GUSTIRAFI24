@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Sewa Awal</h1>
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
                <a href="{{ route('invoices.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">kwitansi</th>
                        <th scope="col">Email</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">penyewa</th>
                        <th scope="col" style="width: 20%">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoices as $index => $invoice)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->user->email }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td>{{ $invoice->amount }}</td>
                        <td>{{ $invoice->user->username }}</td>
                        <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>

                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger" style="background-color: blue;">
                        Masih Bisa Menyawa!!.
                    </div>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $invoices->links() }} --}}
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
