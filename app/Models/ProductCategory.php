<?php

namespace AgulhasMimos\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $timestamps = false;

    public function __construct($attributes = array(), $name = null, $description = null)
    {
        parent::__construct($attributes);
        if(!is_null($name) && !empty($name))
        {
            $this->validateName($name);
            $this->name = $name;
            $this->updateCategory($description);
        }
    }

    private function validateName($name)
    {
        if(!is_null($name) && !empty($name))
        {
            $group = ProductCategory::GetByName($name);
            if(!is_null($group))
            {
                throw Exception("Já existe categoria com nome ".$name);
            }
        }
    }

    private function updateCategory($description)
    {
        $this->description = $description;
        $this->dt_last_modification = date('Y-m-d H:i:s');
    }

    public static function GetById($id)
    {
        if(!is_null($id))
        {
            return ProductCategory::find($id);
        }
    }

    public static function GetByName($name)
    {
        if(!is_null($name) && !empty($name))
        {
            return ProductCategory::where('name', $name)->first();
        }
    }

    public static function ListAll()
    {
        return ProductCategory::all();
    }

    public static function CreateOrUpdate($id, $name, $description)
    {
        $category = ProductCategory::GetById($id);

        if(is_null($category))
        {
            $category = new ProductCategory($attributes = array(), $name, $description);
        }
        else
        {
            $category->updateCategory($description);
        }
        return $category;
    }

    public function deleteCategory()
    {
        $this->delete();
    }
}
