<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\BookStore;
use Illuminate\Support\Facades\DB;

class BookRepository extends BaseRepository
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Book::class;
    }

    public function getAllBook()
    {
        $result = Book::all();

        return $result;
    }

    public function getStoreArrayById($id)
    {
        $storeArray = DB::table('book_store')->select('store_id')->where('book_id', $id)->get();

        return $storeArray;
    }

    public function getLatestBook()
    {
        return Book::latest()->first();
    }

    public function searchBook($text)
    {
        $result = Book::where('book_name', 'LIKE', '%' . $text . '%')
                    ->join('authors', 'books.author_id', '=', 'authors.id')
                    ->orWhere('authors.author_name', 'LIKE', '%' . $text . '%')
                    ->join('categories', 'books.category_id', '=', 'categories.id')
                    ->orWhere('categories.category_name', 'LIKE', '%' . $text . '%')
                    ->get();

        return $result;
    }

}
