<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\order;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        //not the same : ["index", "adminLogout"]
        $this->middleware('auth:admin')
            ->except(["showAdminLoginForm", "adminLogin"]);
    }

    public function index()
    {
        return view("admin.index")->with([
            "products" => product::all(),
            "orders" => order::all()
        ]);
    }

    public function showAdminLoginForm()
    { 
        return view("admin.auth.login");
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (auth()->guard("admin")->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get("remember"))) {
            auth()->guard("web")->logout();
            return redirect("/admin");
           
        } else {
            return redirect()->route("admin.login");
        }
        
    }

    public function adminLogout()
    {
        auth()->guard("admin")->logout();
        return redirect()->route("admin.login");
    }

    public function getProducts()
    {
        return view("admin.products.index")->with([
            "products" => product::latest()->paginate(5)
        ]);
    }

    public function getOrders()
    {
        return view("admin.orders.index")->with([
            "orders" => order::latest()->paginate(5)
        ]);
    }
}