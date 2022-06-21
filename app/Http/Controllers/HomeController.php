<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "О нас";

        return view('home.index')->with('viewData', $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData['title']= "О нас";
        $viewData['subtitle'] = "О нас";
        $viewData['description'] = "Информация о нашем магазине:";
        $viewData['author'] = "Сайт создал : Prasolov Vladimir";

        return view('home.about')->with('viewData', $viewData);
    }
}
