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
                <td>{{ $item->image }}</td>
                <td>{{ $item->is_active }}</td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                  <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-trash"></i></a>
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


