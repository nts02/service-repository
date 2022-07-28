@extends('layout')
@section('title')
    Create Store
@endsection
@section('content')
    <div class="container">
        <h4 style="text-align: center;margin-top: 10px">Add Store </h4>
        <form method="post" action="{{ route('stores.store') }}">
            @csrf
            <br>
            <div class="form-group" style="margin-bottom: 10px">
                <h5>Name</h5>
                <input type="text" class="form-control" name="store_name" value="">
                <br>
                <h5>Address</h5>
                <input type="text" class="form-control" name="address" value="">
            </div>
            <div class="form-group">
                <input type="submit" class ="btn btn-primary " value="Add Store" style="margin-bottom: 15px;">
            </div>

        </form>
    </div>
@endsection
