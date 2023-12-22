@extends('layouts.app', [
    'page' => 'Postfolio Master',
    'active' => 'master'
])

@section('content')
    <div class="row justify-content-center">
      <div class="card" style="width: 60rem;">
        <a href="{{ route('portfolio.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah</a>
        <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Keterangan</th>
                {{-- <th scope="col">Email</th> --}}
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($portos as $item)
              <tr>
                <th scope="row">1</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                {{-- <td>{{ $item->email }}</td> --}}
                <td><img src="{{ asset('assets/images/'.$item->image) }}" width="50" height="50"></td>
                <td>{{ $item->is_active }}</td>
                {{-- <td>{{ $item->id }}</td> --}}
                <td>
                    <a href="{{ route('portfolio.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                    <form action="{{ route('portfolio.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin Hapus ?')" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-trash"></button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{-- {{ $headers->links() }} --}}
        </div>
      </div>
    </div>
@endsection


