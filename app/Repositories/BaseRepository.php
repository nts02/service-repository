<?php

namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    public function index()
    {
        $result = $this->getModel()::all();
        return $result;
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        $result = $this->getModel()::find($id);
        return $result;
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
        return $this->getModel()::create($data);
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
        $result = $this->getModel()::find($id);
        if($result) {
            $result->update($data);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        return $this->getModel()::find($id)->delete();
    }

}
