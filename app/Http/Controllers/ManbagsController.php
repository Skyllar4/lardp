<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ManbagsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Мужские рюкзаки";
        $viewData['products'] = Products::all();
        return view('categories.manbags')->with('viewData', $viewData);
    }
}
