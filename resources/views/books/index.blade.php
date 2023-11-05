@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="col-6">{{ __('Book List') }}</h3>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="{{ route('create') }}" class="btn btn-primary">Add Book</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Added by</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price ($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <th scope="row">{{ $book->id }}</th>
                                        <td>{{ $book->user->name }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->price }}</td>
                                        <td><a href="{{ route('edit', $book->id) }}" class="btn btn-info">Edit</a>
                                        <td><a href="{{ route('delete', $book->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
