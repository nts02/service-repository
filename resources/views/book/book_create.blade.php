@extends('layout')

@section('title')
    Create Book
@endsection

@section('content')
    <div class="container md mt-2 border border-dark" style="width:60%">
        <h3 class="mt-5" style="text-align: center;">Add Book</h3>
        <form action="{{route('books.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Book Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="book_name" value="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="price" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Category <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Default select example"  name="category_id">
                        <option value="" disabled="" selected="">
                            Select Category
                        </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name ?? 'Null'}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Author <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="author_id">
                        <option value="" disabled="" selected="">
                            Select Author
                        </option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->author_name ?? 'Null'}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Store <span class="text-danger">*</span></label>
                    <select class="form-select" multiple="multiple"  name="store_id[]" id="store_id[]">
                        <option value="" disabled selected="">
                            Select Store
                        </option>
                        @foreach($stores as $store)
                        <option value="{{$store->id}}">{{ $store->store_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3"> </textarea>
            </div>
            <div class="text-center">
                <input type="submit" class ="btn btn-primary " value="Add Book" style="margin-bottom: 15px;">
            </div>
        </form>
    </div>


@endsection
