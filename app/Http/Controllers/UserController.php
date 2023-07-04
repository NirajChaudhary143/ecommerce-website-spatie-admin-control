<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $productImage = ProductImage::all();
        $products =Product::paginate(6);
        return view('home.userpage',compact('productImage','products'));       

    }
    public function product_details($id){
        $product = Product::find($id);
        $productImage = ProductImage::where('product_id',$id)->first();
        return view('home.product_detail',compact('product','productImage'));
    }
    public function cart(Request $request,$id){
        $product = Product::where('id',$id)->first();
        $productImage = ProductImage::where('product_id',$id)->first();
        $user_id = auth()->user()->id;
        $cart =new Cart();
        $cart->name= auth()->user()->name;
        $cart->email=auth()->user()->email;
        $cart->user_id=$user_id;
        $cart->product_title = $product->product_title;
        $productQuantity = $request['product_quantity'];
        $productPrice = $product->product_price;
        $totalPrice= $productQuantity * $productPrice;
        $cart->price = $totalPrice;
        $cart->quantity = $request['product_quantity'];
        $cart->image = $productImage->name;
        $cart->product_id= $id;
        $cart->product_title = $product->product_title;

        $cart->save();
        return redirect('/display-carts');

      
    }
    public function displayCart(){
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id',$user_id)->get();
        return view('home.displayCarts',compact('carts'));
    }
    public function deleteCart($id){
        Cart::find($id)->delete();
        return redirect('/display-carts');
    }
}
