<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getModel()
    {
        return Category::class;
    }

    public function getAllCategory()
    {
        $result = $this->index();
        return $result;
    }

    public function searchCategory($text)
    {
        $result = Category::where('category_name','LIKE','%'.$text.'%')->get();
        return $result;
    }
}
