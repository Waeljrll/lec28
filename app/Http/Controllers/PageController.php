<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PageController extends Controller
{
    public function home($test = null)
    {
        $products = [
            ["title" => "product 1" , "price" => "1000" , "rate" => "1200"],
            ["title" => "product 2" , "price" => "1300" , "rate" => "1600"],
            ["title" => "product 3" , "price" => "1500" , "rate" => "2000"],
        ];
        return view("home",['products' => $products,'test' => $test]);
    }

    public function cart()
    {
        return view("cart");
    }

    public function login()
    {
        return view("login");
    }
    public function sign_in(Request $request)
    {
        dd($request);
    }
}
