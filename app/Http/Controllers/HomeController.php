<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::take(3)->get();
        return view('index')->with([
            'products'=>$products
        ]);
    }

    public function about()
    {
        return view('pages.about')->with([
            'page'=>'About Us'
        ]);
    }

    public function connect()
    {
        return view('pages.connect')->with([
            'page'=>'Connect'
        ]);
    }
}
