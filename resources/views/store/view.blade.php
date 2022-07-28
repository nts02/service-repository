@extends('layout')

@section('title')
    Store Details
@endsection

@section('content')


    <div class="container md mt-2 border border-dark" style="width:60%">
        <h3 class="mt-5" style="text-align: center;">Store Details</h3>
        <div class="row">
            <input type="hidden" name="id" value="{{ $store->id }}">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Store Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="store_name" value="{{$store->store_name}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="address" value="{{$store->address}}" readonly>
            </div>
        </div>
        <table class="table border" id="myTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @php
                $cnt = 1;
            @endphp
            @foreach($store->books as $book)
                <tr>
                    <th scope="row">{{$cnt++}}</th>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->author->author_name ?? ''}}</td>
                    <td>{{$book->category->category_name ?? ''}}</td>
                    <td>{{$book->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <form action="{{route('stores.edit', $store->id)}}" method="post" >
                @method('get')
                <button type="submit" class="btn btn-primary" style="margin: 15px;">Edit Store</button>
            </form>
        </div>
    </div>


@endsection
