<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Каталог";
        $viewData['subtitle'] = "Список товаров";
        $viewData['products'] = Products::all();

        return view('products.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Products::findOrFail($id);
        $viewData['title'] = $product->getName();
        $viewData['subtitle'] = $product->getName()." Информация о товаре";
        $viewData['product'] = $product;
        return view('products.show')->with("viewData", $viewData);
    }
}
