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
                        <h1 class="h5">List of All Book</h1>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Descriptio</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($books as $book)

                                    <tr>
                                        <td>
                                            @if ($book->image)
                                                <img src="{{ Storage::url($book->image) }}" width="50" >
                                            @else
                                                <img src="{{ Storage::url('img/default.jpg') }}" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->description }}</td>
                                        <td>{{ $book->category }}</td>
                                        <td>
                                            <a href="{{ route('book.edit', $book->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('book.destroy', $book->id) }}" method="post">@csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty

                                    <td>No any book</td>

                                @endforelse ($books as $book)

                            </tbody>
                        </table>

                        {{-- #card body --}}
                    </div>
                    {{ $books->links() }}
                    {{-- #card --}}
                </div>
            </div>
        </div>
        {{-- #container --}}
    </div>

@endsection
