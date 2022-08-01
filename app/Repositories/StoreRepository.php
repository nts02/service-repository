<?php

namespace App\Repositories;

use App\Models\BookStore;
use App\Models\Store;

class StoreRepository extends BaseRepository
{
    protected $model;

    public function __construct(Store $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return Store::class;
    }

    public function getAllStore()
    {
        return $this->index();
    }

    public function searchStore($data)
    {
        $result = Store::where('store_name','LIKE','%'.$data.'%')
                       ->orWhere('address','LIKE','%'.$data.'%')->get();

        return $result;
    }
}
