<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        $text = \request()->search;
        if ($text != "") {
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
        $validator = Validator::make($data, [
            'category_name' => 'required|max:50'
        ]);
        if ($validator->fails()) {
            return false;
        }

        $category_name = trim(strtolower($data['category_name']), " ");
        $confirm_name  = trim(strtolower($data['confirm_name']), " ");

        if ($category_name == $confirm_name) {
            unset($data['confirm_name']);

            return $this->categoryRepository->create($data);
        }

        return false;
    }

    public function update(array $data, $id)
    {
        if ($data['category_name'] == '') {
            return false;
        } else {
            $current_name  = trim(strtolower($data['category_current_name']), " ");
            $category_name = trim(strtolower($data['category_name']), " ");

            if ($category_name != $current_name) {
                unset($data['category_current_name']);

                return $this->categoryRepository->update($data, $id);
            }
        }

        return false;
    }

    public function delete($id)
    {
        $this->categoryRepository->find($id)->books()->delete();

        return $this->categoryRepository->delete($id);
    }
}
