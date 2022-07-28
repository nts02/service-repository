@extends('layout')

@section('title')
    Edit Store
@endsection

@section('content')
    <div class="container">
        <h4 style="text-align: center;margin-top: 10px">Edit Store</h4>
        <form method="post" action="{{ route('stores.update',$store->id) }}">
            @csrf
            @method('PUT')
            <br>
            <input type="hidden" name="id" value="{{ $store->id }}">
            <div class="form-group" style="margin-bottom: 10px">
                <h5>Store Name</h5>
                <input type="text" class="form-control" name="store_name" value="{{ $store->store_name }}">
                <br>
                <h5>Address</h5>
                <input type="text" class="form-control" name="address" value="{{ $store->address }}">
            </div>
            <div class="form-group" style="margin-left: 10px">
                <input type="submit" class ="btn btn-primary " value="Update Store" style="margin-bottom: 15px;">
            </div>

        </form>
    </div>

@endsection
