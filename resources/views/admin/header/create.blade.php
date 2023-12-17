@extends('layouts.app', [
    'page' => 'Create Header',
    'active' => 'master'
])

@section('content')
    <div class="row justify-content-center">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <form class="user" method="POST" action="{{ route('header.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-user"
                            id="exampleInputEmail" placeholder="Enter Name...">
                    </div>
                    <div class="form-group">
                        <input type="text" name="as" class="form-control form-control-user"
                            id="exampleInputEmail" placeholder="Enter As...">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user"
                            id="exampleInputEmail" placeholder="Enter Email...">
                    </div>
                    <div class="form-group">
                        <label for="image">Choose Image:</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" accept="image/*">
                            <label class="custom-file-label" for="image">Select file...</label>
                        </div>
                    </div>
                    

                    <button type="submit" class="btn btn-primary btn-user btn-block">Create</button>
                    <a href="{{ route('header.index') }}" class="btn btn-danger btn-user btn-block">Back</a>

                </form>
            </div>
        </div>
    </div>
@endsection