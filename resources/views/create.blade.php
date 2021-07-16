@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>

                @endif

                <div class="card">
                    <div class="card-header">
                        <h1 class="h5">Create a new Book</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <label for="">Name of Book</label>
                            <input type="text" class="form-control" name="name" placeholder="Name of Book" id="" required>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <label for="">Description of Book</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="3" required></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            <br>
                            <label for="">Category of Book</label>
                            <select name="category" id="" class="form-control" required>
                                <option value="" disabled selected>Select a option</option>
                                <option value="frictional">Frictional Book</option>
                                <option value="biography">Biography</option>
                                <option value="comedy">Comedy</option>
                                <option value="education">Education</option>
                            </select>
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                            <br>

                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" id=""
                                accept="image/png,image/jpg,image/jpeg" required>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            <br>

                            <input type="submit" value="Sumbit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
