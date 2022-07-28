@extends('layout')

@section('title')
    List Book
@endsection

@section('content')
    <div class="container mt-2 border border-dark" style="padding: 5px" >
        <div style="display: flex;align-items: center">
            <a href="{{ route('books.create') }}">
                <input type="button" class="btn btn-primary" value="Add Book"
                       style="margin-bottom: 15px;margin-top: 10px">
            </a>
            <form action="{{ route('books.index') }}" method="get" class="form-inline my-2 my-lg-0"
                  style="display: flex;margin-left: auto;margin-top: 10px;height: 38px">
                <input type="search" class="form-control mr-sm-2" name="search" placeholder="Search.....">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" style="margin-left: 10px">Search</button>
            </form>
        </div>
        <table class="table border">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @php
                $cnt = 1;
            @endphp
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{$cnt++}}</th>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->author->author_name ?? ''}}</td>
                    <td>{{$book->category->category_name ?? ''}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <form action="{{ route('books.show',$book->id) }}" method="post">
                            @method('get')
                            <button type="submit" class="btn btn-info">View</button>
                        </form>
                        <form action="{{route('books.edit', $book->id)}}" method="post" >
                            @method('get')
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form action="{{route('books.destroy', $book->id)}}" method="post" onclick="return myFunction();">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

@endsection
