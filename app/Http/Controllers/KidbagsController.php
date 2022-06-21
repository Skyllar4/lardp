<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class KidbagsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Детские рюкзаки";
        $viewData['products'] = Products::all();
        return view('categories.kidbags')->with('viewData', $viewData);
    }
}
