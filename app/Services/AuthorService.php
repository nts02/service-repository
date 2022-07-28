<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function index()
    {
        $text = \request()->search;
        if($text !="") {
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

    public function update(array $data,$id)
    {
        if($data['author_name']=='') {
            return false;
        }
        else {
            $current_name = trim(strtolower($data['current_name'])," ");
            $author_name = trim(strtolower($data['author_name'])," ");

            if($current_name != $author_name) {
                unset($data['current_name']);
                return $this->authorRepository->update($data,$id);
            }

        }

        return false;
    }

    public function delete($id)
    {
        return $this->authorRepository->delete($id);
    }
}
