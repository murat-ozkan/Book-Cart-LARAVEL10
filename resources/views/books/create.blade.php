@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="col-6 ">{{ __('Add Book') }}</h3>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="{{ route('books.index') }}" class="btn btn-primary">Book List</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Book Name:</label>
                                <input type="text" name="name" class="form-control" placeholder="Name of the book">
                            </div>
                            <div class="form-group">
                                <label for="">Book Price:</label>
                                <input type="text" name="price" class="form-control" placeholder="Price of the book">
                            </div>
                            <button type="submit" class="btn btn-success mt-1">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
