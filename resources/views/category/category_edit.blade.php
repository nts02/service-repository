@extends('layout')

@section('title')
    Edit Category
@endsection

@section('content')
    <div class="container">
        <h4 style="text-align: center;margin-top: 10px">Edit Category Name</h4>
        <form method="post" action="{{ route('categories.update',$category->id) }}">
            @csrf
            <br>
            @method('PUT')
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="form-group" style="margin-bottom: 10px">
                <h5>Current Name</h5>
                <input type="text" class="form-control" name="category_current_name" value="{{ $category->category_name }}" readonly>
                <br>
                <h5>New Name</h5>
                <input type="text" class="form-control" name="category_name" value="">
            </div>
            <div class="form-group">
                <input type="submit" class ="btn btn-primary " value="Update" style="margin-bottom: 15px;">
            </div>

        </form>
    </div>

@endsection
