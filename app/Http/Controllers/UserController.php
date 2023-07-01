<?php

namespace App\Http\Controllers;

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
    }
}
