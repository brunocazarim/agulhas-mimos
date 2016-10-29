<?php

namespace AgulhasMimos\Http\Controllers;

use Request;
use AgulhasMimos\Http\Requests\ProductRequest;
use AgulhasMimos\Http\Requests\ProductGroupRequest;
use AgulhasMimos\Product as Product;
use AgulhasMimos\ProductGroup as ProductGroup;

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

    public function createOrUpdateProduct(ProductRequest $request)
    {
        // TODO: não está trazendo o id para fazer update de produtos
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('qty');
        $details = $request->input('details');

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

        // TODO: Como fazer para exibir mensagem de exclusão, assim como a mensagem de inserção, é preciso diferenciar as duas
        return redirect()->action('ProductsController@listAllProducts');
    }

    public function listAllProductGroups()
    {
        $groups = ProductGroup::ListAll();
        return view('group.groups')->with('groups', $groups);
    }

    public function getProductGroup($id)
    {
        $group = ProductGroup::GetById($id);
        if(is_null($group) && $id != 0)
        {
            return view('group.error');
        }
        else
        {
            return view('group.edit')->with('group', $group);
        }
    }

    public function createOrUpdateProductGroup(ProductGroupRequest $request)
    {
        // TODO: não está trazendo o id para fazer update de produtos
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');

        $group = ProductGroup::CreateOrUpdate($id, $name, $description);
        $group->save();

        return redirect()->action('ProductsController@listAllProductGroups')->withInput(Request::only('name'));
    }

    public function deleteProductGroup()
    {
        $id = Request::input('id');
        $group = ProductGroup::GetById($id);
        $groupName = $product->NAM_GROUP;
        $group->deleteGroup();

        // TODO: Como fazer para exibir mensagem de exclusão, assim como a mensagem de inserção, é preciso diferenciar as duas
        return redirect()->action('ProductsController@listAllProductGroup');
    }
}
