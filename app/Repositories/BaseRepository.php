<?php

namespace AgulhasMimos\Repositories;

use AgulhasMimos\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class BaseRepository implements BaseRepositoryInterface
{
    private $app;

    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->model = makeModel();
    }

    abstract function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if(!$model instanceof Model)
            throw new Exception("Class {$this->model()} must be an instance of Eloquent Model");
        
        return $model;
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute="id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
}