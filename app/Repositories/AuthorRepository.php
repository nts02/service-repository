<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorRepository extends BaseRepository
{
    protected $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Author::class;
    }

    public function getAllAuthor()
    {
        $result = Author::all();
        return $result;
    }

    public function getAuthorById($id)
    {
        return Author::findOrFail($id);
    }

    public function searchAuthor($text)
    {
        $result = Author::where('author_name','LIKE','%'.$text.'%')->get();
        return $result;
    }
}
