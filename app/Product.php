<?php

namespace AgulhasMimos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use AgulhasMimos\Util\Util as Util;

class Product extends Model
{
    public $timestamps = false;

    public function __construct($attributes = array(), $name = null, $category = null, $description = null, 
        $price = null, $quantity = null)
    {
        parent::__construct($attributes);
        if(!is_null($name) && !empty($name))
        {
            $code = Product::GenerateCode();
            $this->validateCode($code);
            $this->code = $code;
            $this->updateProduct($name, $description, $price);
        }
    }

    private function updateProduct($name, $category, $description, $price, $quantity)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = is_null($price) ? 0.00 : $price;
        $this->dt_last_modification = date('Y-m-d H:i:s');
        // mais três métodos:
        // updateCategory($category);
        // updateSpecifications();
        // updateInventory($quantity);
    }

    private function validateCode($code)
    {
        if(!is_null($code) && !empty($code))
        {
            $product = Product::GetByCode($code);
            if(!is_null($product))
            {
                throw Exception("Já existe produto com código ".$code);
            }
        }
    }

    public static function GetById($id)
    {
        if(!is_null($id))
        {
            return Product::find($id);
        }
    }

    public static function GetByCode($code)
    {
        if(!is_null($code) && !empty($code))
        {
            return Product::where('code', $code)->first();
        }
    }

    public static function ListAll()
    {
        return Product::all();
    }

    public static function CreateOrUpdate($id, $name, $category, $price, $quantity, $description)
    {
        $product = Product::GetById($id);

        if(is_null($product))
        {
            $product = new Product($attributes = array(), $name, $category, $description, $price);
        }
        else
        {
            $product->updateProduct($name, $category, $description, $price, $quantity);
        }
        return $product;
    }

    public function deleteProduct()
    {
        $this->delete();
    }

    public static function GenerateCode()
    {
        $lastProduct = Product::orderBy('code', 'desc')->first();
        if(is_null($lastProduct))
        {
            return "0000000001";
        }
        else
        {
            $lastCode = intval($lastProduct->code);
            $newCode = $lastCode + 1;
            return Util::FillWithLeftZeros(strval($newCode), 10);
        }
    }
}
