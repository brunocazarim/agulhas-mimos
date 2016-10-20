<?php

namespace AgulhasMimos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use AgulhasMimos\Util\Util as Util;

class Product extends Model
{
    protected $primaryKey = 'ID_PRODUCT';
    public $timestamps = false;

    public function __construct($attributes = array(), $name = null, $details = null, $price = null)
    {
        parent::__construct($attributes);
        if(!is_null($name) && !empty($name))
        {
            $code = Product::GenerateCode();
            $this->validateCode($code);
            $this->COD_PRODUCT = $code;
            $this->updateProduct($name, $details, $price);
        }
    }

    private function updateProduct($name, $details, $price)
    {
        $this->NAM_PRODUCT = $name;
        $this->DETAILS_PRODUCT = $details;
        $this->PRICE = is_null($price) ? 0.00 : $price;
        $this->IS_ACTIVE = true;
        $this->DT_LAST_MODIFICATION = date('Y-m-d H:i:s');
    }

    private function validateCode($code)
    {
        if(!is_null($code) && !empty($code))
        {
            $product = Product::GetByCode($code);
            if(!is_null($product))
            {
                // trhow expection
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
            return Product::where('COD_PRODUCT', $code)->first();
        }
    }

    public static function ListAll()
    {
        return Product::all();
    }

    public static function CreateOrUpdate($id, $name, $price, $quantity, $details)
    {
        $product = Product::GetById($id);

        if(is_null($product))
        {
            $product = new Product($attributes = array(), $name, $details, $price);
        }
        else
        {
            $product->updateProduct($name, $details, $price);
        }
        return $product;
    }

    public function deleteProduct()
    {
        $this->delete();
    }

    public static function GenerateCode()
    {
        $lastProduct = Product::orderBy('COD_PRODUCT', 'desc')->first();
        if(is_null($lastProduct))
        {
            return "0000000001";
        }
        else
        {
            $lastCode = intval($lastProduct->COD_PRODUCT);
            $newCode = $lastCode + 1;
            return Util::FillWithLeftZeros(strval($newCode), 10);
        }
    }
}
