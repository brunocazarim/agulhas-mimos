<?php

namespace AgulhasMimos\Http\Controllers;

use Request;
use AgulhasMimos\Http\Requests\ProductRequest;
use AgulhasMimos\Http\Requests\ProductCategoryRequest;
use AgulhasMimos\Product as Product;
use AgulhasMimos\ProductCategory as ProductCategory;

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
            $categories = ProductCategory::ListAll();
            return view('product.edit')->with(['product' => $product, 'categories' => $categories]);
        }
    }

    public function createOrUpdateProduct(ProductRequest $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $category = $request->input('category');
        $price = $request->input('price');
        $quantity = $request->input('qty');
        $description = $request->input('description');

        $product = Product::CreateOrUpdate($id, $name, $category, $price, $quantity, $description);
        $product->save();
        // TODO: Ao fazer update mensagem diz que novo produto foi adicionado
        return redirect()->action('ProductsController@listAllProducts')->withInput(Request::only('name'));
    }

    public function deleteProduct()
    {
        $id = Request::input('id');
        $product = Product::GetById($id);
        $product->deleteProduct();

        // TODO: Como fazer para exibir mensagem de exclusão, assim como a mensagem de inserção, é preciso diferenciar as duas
        return redirect()->action('ProductsController@listAllProducts');
    }

    public function listAllCategories()
    {
        $categories = ProductCategory::ListAll();
        return view('category.categories')->with('categories', $categories);
    }

    public function getCategory($id)
    {
        $category = ProductCategory::GetById($id);
        if(is_null($category) && $id != 0)
        {
            return view('category.error');
        }
        else
        {
            return view('category.edit')->with('category', $category);
        }
    }

    public function createOrUpdateCategory(ProductCategoryRequest $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');

        $category = ProductCategory::CreateOrUpdate($id, $name, $description);
        $category->save();

        return redirect()->action('ProductsController@listAllCategories')->withInput(Request::only('name'));
    }

    public function deleteCategory()
    {
        $id = Request::input('id');
        $category = ProductCategory::GetById($id);
        $category->deleteCategory();

        // TODO: Como fazer para exibir mensagem de exclusão, assim como a mensagem de inserção, é preciso diferenciar as duas
        return redirect()->action('ProductsController@listAllCategories');
    }
}
