<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //return cart items
    public function index(){
        return view("cart.index")->with([
            "items" => \Cart::getContent()
        ]);
    }

    //add item to cart 
    public function addProductToCart(Request $request, product $product){
        \Cart::add(array(
            "id" => $product->id,
            "name" => $product->title,
            "price" => $product->price,
            "quantity" => $request->qty,
            "attributes" => array(),
            "associatedModel" => $product,
        ));
        return redirect()->route("cart.index");
    }


    //update item on cart
    public function updateProductOnCart(Request $request, product $product){
        \Cart::update($product->id, array(
            "quantity" => array(
                "relative" => false,
                "value" => $request->qty
            ),
        ));
        return redirect()->route("cart.index");
    }

    
    //remove item from cart
    public function removeProductFromCart(product $product){
        \Cart::remove($product->id);
        return redirect()->route("cart.index");
    }


}
