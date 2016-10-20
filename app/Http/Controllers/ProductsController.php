<?php

namespace AgulhasMimos\Http\Controllers;

use Request;
use AgulhasMimos\Http\Requests;
use AgulhasMimos\Product as Product;

class ProductsController extends Controller
{
    public function listAllProducts()
    {
        $products = Product::ListAll();
        return view('product.products')->with('products', $products);
    }

    public function getProduct($id)
    {
        $product = Product::GetById($id);
        if(is_null($product) && $id != 0)
        {
            return view('product.error');
        }
        else
        {
            return view('product.edit')->with('product', $product);
        }
    }

    public function createOrUpdateProduct()
    {
        $id = Request::input('prod-id');
        $name = Request::input('name');
        $price = Request::input('price');
        $quantity = Request::input('qty');
        $details = Request::input('details');

        $product = Product::CreateOrUpdate($id, $name, $price, $quantity, $details);
        $product->save();

        return redirect()->action('ProductsController@listAllProducts')->withInput(Request::only('name'));
    }

    public function deleteProduct()
    {
        $id = Request::input('id');
        $product = Product::GetById($id);
        $productName = $product->NAM_PRODUCT;
        $product->deleteProduct();

        // TODO: Como fazer par exibir mensagem de exclusão, assim como a mensagem de inserção, é preciso diferenciar as duas
        return redirect()->action('ProductsController@listAllProducts');
    }
}
