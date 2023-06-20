<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\tempImage;
use Dotenv\Validator;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProductForm()    {
        // $products = Product::with('category')->get();
        $categories= Category::all();
        $submit = "Add Product";
        return view('admin.addProduct',compact('categories','submit'));
    }

    public function addProduct(Request $request){
        // print_r($request->post());

        $request->validate([
            'product_title' => ['required', 'not_regex:/^[0-9]+$/'],
            'product_description'=>['required', 'not_regex:/^[0-9]+$/'],
            'product_quantity'=>'required',
            
            'product_category'=>'required',
            'product_price'=>['required', 'regex:/^[0-9]+$/'],
            
        ]);

        $product = new Product();
        $product->product_title=$request['product_title'];
        $product->product_description=$request['product_description'];
        $product->product_quantity=$request['product_quantity'];
        $product->product_discount=$request['discount_price'];
        $product->category_id=$request['product_category'];
        $product->product_price=$request['product_price'];
        $product->product_image="Null";
        $result= $product->save();

        if(!empty($request->image_id)){
            foreach($request->image_id as $key => $imageId){
                $tempImage=tempImage::find($imageId);
                $extArray = explode('.',$tempImage->name);
                $ext =last($extArray);

                $productImage = new ProductImage();
                $productImage->name='NULL';
                $productImage->product_id=$product->id;
                $productImage->save();

                $newImageName = $productImage->id.'.'.$ext;
                $productImage->name=$newImageName;
                $productImage->save();
                
                // $tempImage->name->move(public_path('uploads/temp/'),$$newImageName);

                $sourcePath = public_path('uploads/temp/').$tempImage->name;
                $destPath = public_path('/uploads/products/').$newImageName;
                $img = Image::make($sourcePath);
                $img->fit(350,300);
                $img->save($destPath);

              
                $product->product_image = "/uploads/products/".$newImageName;
                $product->save();
                
            }
        }        
        
        if($result){
            return redirect('/show-product');
        }
    }

    public function showProduct(){
        $products = Product::with('category')->get();
        $productImage = ProductImage::all();
        return view('admin.showProduct',compact('products','productImage'));
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        if($product){
            if(auth()->user()->roles->contains('name','admin')){
                $product->delete();
                return redirect('/show-product')->with('success','Product Deleted Succesfully.');
            }
            else{
                abort(403,'Unauthorized Action');
            }
            
        }
        else{
            return redirect('/show-product')->with('fail','The id you provided are not in database.');
        }
    }

    public function editProduct($id){
        $product = Product::with('category')->where('id',$id)->first();
        $productImages = ProductImage::where('product_id',$id)->get();
        $categories = Category::all();
        $submit = "Update";
        $check="edit";
        if($product){

            return view('admin.editProduct',compact('product','categories','submit','check','productImages'));
        }
        else{
            return redirect('/show-product')->with('fail','The id you provided are not in database.');
        }
    }


    public function updateProduct(Request $request,$id){
        $request->validate([
            'product_title'=>['required', 'not_regex:/^[0-9]+$/'],
            'product_description'=>['required', 'not_regex:/^[0-9]+$/'],
            'product_quantity'=>'required',
            
            'product_category'=>'required',
            'product_price'=>['required', 'regex:/^[0-9]+$/'],
            
        ]);

        $product = Product::where('id',$id)->first();

        
        if($product){
            // if ($request->hasFile('image')) {
            //     $fileName = time() . '-niraj.' . $request->file('image')->getClientOriginalExtension();
            //     $path = $request->file('image')->storeAs('products_image', $fileName, 'public');
            //     $product->product_image = '/storage/' . $path;
            // }
            
            // $fileName =time().'-niraj.'.$request->file('image')->getClientOriginalExtension();
            // $path = $request->file('image')->storeAs('products_image',$fileName,'public');
            // $product->product_image = '/storage/'.$path;

            $product->product_title=$request['product_title'];
            $product->product_description=$request['product_description'];
            $product->product_quantity=$request['product_quantity'];
            $product->product_discount=$request['discount_price'];
            $product->category_id=$request['product_category'];
            $product->product_price=$request['product_price'];
            $product->save();
            
            return redirect('/show-product')->with('success','Product Updated Succesfully.');

        }
    }

    
}
