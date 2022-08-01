<?php

namespace App\Services;

use App\Repositories\StoreRepository;
use Illuminate\Support\Facades\Validator;

class StoreService
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function getAll()
    {
        $text = \request()->search;
        if ($text != "") {
            return $this->storeRepository->searchStore($text);
        }

        return $this->storeRepository->getAllStore();
    }

    public function show($id)
    {
        return $this->storeRepository->find($id);
    }

    public function store(array $data)
    {
        $validator = Validator::make($data, [
            'store_name' => 'required|max:50',
            'address'    => 'required'
        ]);

        if ( ! $validator->fails()) {
            return $this->storeRepository->create($data);
        }

        return false;
    }

    public function update(array $data, $id)
    {
        if ($data['store_name'] != null and $data['address'] != null) {
            return $this->storeRepository->update($data, $id);
        }

        return false;
    }

    public function delete($id)
    {
        return $this->storeRepository->delete($id);
    }

}
