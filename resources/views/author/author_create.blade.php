@extends('layout')

@section('title')
    Create Author
@endsection

@section('content')
    <div class="container">
        <h4 style="text-align: center;margin-top: 10px">Create Author </h4>
        <form method="post" action="{{ route('authors.store') }}">
            @csrf
            <br>
            <div class="form-group" style="margin-bottom: 10px">
                <h5>Author Name</h5>
                <input type="text" class="form-control" name="new_name" value="">
                <br>
                <h5>Confirm Name</h5>
                <input type="text" class="form-control" name="author_name" value="">
            </div>
            <div class="form-group" style="margin-left: 10px">
                <input type="submit" class ="btn btn-primary " value="Update" style="margin-bottom: 15px;">
            </div>
        </form>
    </div>

@endsection
