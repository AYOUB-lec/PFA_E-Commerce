<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            "products" => product::latest()->paginate(5),
            "categories" => category::has("products")->get(),
        ]);
    }

     /**
     * Show products by category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProductByCategory(category $category)
    {
        $products = $category->products()->paginate(10);
        return view('home')->with([
            "products" => $products,
            "categories" => category::has("products")->get(),
        ]);
    }
}
