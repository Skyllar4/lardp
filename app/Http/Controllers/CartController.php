<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total =0;
        $productsInCart = [];

        $productsInSession = $request->session()->get('products');

        if($productsInSession){

            $productsInCart = Products::findMany(array_keys($productsInSession));
            $total = Products::sumPricesByQuantities($productsInCart, $productsInSession);

            $viewData = [];
            $viewData['title'] = "Избранное";
            $viewData['subtitle'] = "Избранное";
            $viewData['total'] = $total;
            $viewData['products'] = $productsInCart;
            return view('cart.index')->with('viewData', $viewData);
        }
        else
        {
            $viewData = [];
            $viewData['title'] = "Избранное";
            $viewData['subtitle'] = "";
            $viewData['products'] = "";
            $viewData['message_empty_cart1'] = "";
            $viewData['message_empty_cart2'] = "В избранное ничего не добавлено. Пожалуйста, просмотрите наш каталог, нажав на кнопку ниже.";
            return view('cart.index')->with('viewData', $viewData);
        }
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return redirect()->route('products.index')->with("Успешное удаление", "В вашем списке избранного пусто.");

    }
}
