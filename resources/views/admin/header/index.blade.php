@extends('layouts.app', [
    'page' => 'Header Master',
    'active' => 'master'
])

@section('content')
    <div class="row justify-content-center">
      <div class="card" style="width: 60rem;">
        <a href="{{ route('header.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah</a>
        <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">As</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($headers as $item)
              <tr>
                <th scope="row">1</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->as }}</td>
                <td>{{ $item->email }}</td>
                <td><img src="{{ asset('assets/images/'.$item->image) }}" width="50" height="50"></td>
                <td>{{ $item->is_active }}</td>
                {{-- <td>{{ $item->id }}</td> --}}
                <td>
                    <a href="{{ route('header.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                    <form action="{{ route('header.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin Hapus ?')" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-trash"></button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{ $headers->links() }}
        </div>
      </div>
    </div>
@endsection


