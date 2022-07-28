@extends('layout')

@section('title')
    Book Details
@endsection

@section('content')


    <div class="container md mt-2 border border-dark" style="width:60%">
        <h3 class="mt-5" style="text-align: center;">Book Details</h3>
        <div class="row">
            <input type="hidden" name="id" value="{{ $book->id }}">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Book Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="book_name" value="{{$book->book_name}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Price <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="price" value="{{$book->price}}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ $book->category->category_name }}" readonly>
            </div>
            <div class="col-md-4 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Author <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ $book->author->author_name }}" readonly>
            </div>

            <div class="col-md-4 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Store <span class="text-danger">*</span></label>
                <select class="form-select" multiple="multiple"  name="store_id[]" id="store_id[]">
                    @foreach($book->stores as $item)
                    <option value="{{$item->store_id}}" selected>{{$item->store_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4" readonly>{{$book->description}} </textarea>
        </div>
        <div class="text-center">
            <form action="{{route('books.edit', $book->id)}}" method="post" >
                @method('get')
                <button type="submit" class="btn btn-primary" style="margin: 15px;">Edit Book</button>
            </form>
        </div>

    </div>


@endsection
