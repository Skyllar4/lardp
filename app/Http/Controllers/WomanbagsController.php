<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class WomanbagsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Женские рюкзаки";
        $viewData['products'] = Products::all();

        return view('categories.womanbags')->with('viewData', $viewData);
    }
}
