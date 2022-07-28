@extends('layout')

@section('title')
    Edit Author
@endsection

@section('content')
    <div class="container">
        <h4 style="text-align: center;margin-top: 10px">Edit Author Name</h4>
        <form method="POST" action="{{ route('authors.update',$author->id) }}">
            @csrf
            <br>
            @method('PUT')
            <input type="hidden" name="id" value="{{ $author->id }}">
            <div class="form-group" style="margin-bottom: 10px">
                <h5>Current Name</h5>
                <input type="text" class="form-control" name="current_name" value="{{ $author->author_name }}"  readonly >
                <br>
                <h5>New Name</h5>
                <input type="text" class="form-control" name="author_name" value="">

            </div>
            <div class="form-group" style="margin-left: 10px">
                <input type="submit" class ="btn btn-primary " value="Update" style="margin-bottom: 15px;">
            </div>

        </form>
    </div>

@endsection
