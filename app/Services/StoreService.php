<?php

namespace App\Services;

use App\Repositories\StoreRepository;

class StoreService
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function index()
    {
        $text = \request()->search;
        if($text!="") {
            return $this->storeRepository->searchStore($text);
        }
        return $this->storeRepository->getListStore();
    }

    public function show($id)
    {
        return $this->storeRepository->find($id);
    }

    public function store(array $data)
    {
        if($data['store_name'] != null AND $data['address'] != null){
            return $this->storeRepository->create($data);
        }

        return false;
    }

    public function update(array $data,$id)
    {
        if($data['store_name']!=null AND $data['address']!=null){
            return $this->storeRepository->update($data,$id);
        }

        return false;
    }

    public function delete($id)
    {
        return $this->storeRepository->delete($id);
    }
}
