<?php

namespace App\Services;

use App\Repositories\AuthorRepository;
use Illuminate\Support\Facades\Validator;


class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAll()
    {
        $text = \request()->search;
        if ($text != "") {
            return $this->authorRepository->searchAuthor($text);
        }

        return $this->authorRepository->getAllAuthor();
    }

    public function show($id)
    {
        return $this->authorRepository->find($id);
    }

    public function store(array $data)
    {
        unset($data['new_name']);

        return $this->authorRepository->create($data);
    }

    public function update(array $data, $id)
    {
        $validator = Validator::make($data,[
            'author_name' => 'required|max:50'
        ]);
        if($validator->fails()) {
            return false;
        }

        $currentAuthorName = trim(strtolower($data['current_name']), " ");
        $newAuthorName     = trim(strtolower($data['author_name']), " ");

        if ($currentAuthorName != $newAuthorName) {
            unset($data['current_name']);

            return $this->authorRepository->update($data, $id);
        }

        return false;
    }

    public function delete($id)
    {
        $this->authorRepository->getAuthorById($id)->books()->delete();

        return $this->authorRepository->delete($id);
    }
}
