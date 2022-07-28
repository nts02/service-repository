<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $text = \request()->search;
        if($text!="") {
            return $this->categoryRepository->searchCategory($text);
        }
        return $this->categoryRepository->getAllCategory();
    }

    public function show($id)
    {

        return $this->categoryRepository->find($id);
    }

    public function store(array $data)
    {
        if($data['category_name'] == '') {
            return false;
        }
        else {
            $category_name = trim(strtolower($data['category_name'])," ");
            $confirm_name = trim(strtolower($data['confirm_name'])," ");

            if($category_name == $confirm_name) {
                unset($data['confirm_name']);
                return $this->categoryRepository->create($data);
            }
        }

        return false;
    }

    public function update(array $data,$id)
    {
        if($data['category_name']=='') {
            return false;
        }
        else {
            $current_name = trim(strtolower($data['category_current_name'])," ");
            $category_name = trim(strtolower($data['category_name'])," ");

            if($category_name != $current_name) {
                unset($data['category_current_name']);
                return $this->categoryRepository->update($data,$id);
            }
        }

        return false;
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }
}
