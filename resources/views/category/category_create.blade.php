@extends('layout')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="container">
        <h4 style="text-align: center;margin-top: 10px">Add Category Name</h4>
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <br>
            <div class="form-group" style="margin-bottom: 10px">
                <h5>Category Name</h5>
                <input type="text" class="form-control" name="category_name" value="">
                <br>
                <h5>Confirm Name</h5>
                <input type="text" class="form-control" name="confirm_name" value="">
            </div>
            <div class="form-group" >
                <input type="submit" class ="btn btn-primary" value="Add New Category" style="margin-bottom: 15px;">
            </div>
        </form>
    </div>
@endsection
