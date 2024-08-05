@extends('template.app')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('pengguna.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
          </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Level</th>
                    <th scope="col">ACTIONS</th>
                </tr>
              <tr>
                @forelse ($user as $index => $pengguna)
                <tr>
                    <td class="text-center">
                        {{ ++$index }}
                    </td>
                    <td>{{ $pengguna->username }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>{!! Str::limit($pengguna->password,10) !!}</td>
                    <td>{{ $pengguna->level }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST">
                            <a href="{{ route('pengguna.show', $pengguna->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data User Belum Ada.
                </div>
            @endforelse
              </tr>


            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
