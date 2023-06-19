<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use PDO;

class ProductLivewire extends Component
{
    use WithFileUploads;
    public $categories,$product_title,$product_description,$product_image,$category_id,$product_discount,$product_price,$product_quantity,$check="add";
    public function render()
    {
        return view('livewire.product-livewire');
    }
    public function index(){
        $categories= Category::all();
        return view('admin.product',compact('categories'));
    }
    public function mount(){
        $this->categories =Category::all();
    }
    public function updated($field){
        $this->validateOnly($field,[
            'product_title'=>['required', 'not_regex:/^[0-9]+$/'],
            'product_description'=>['required', 'not_regex:/^[0-9]+$/'],
            'product_image'=>'required|image|mimes:jpeg,jpg,png',
            'category_id'=>'required',
            'product_price'=>['required', 'regex:/^[0-9]+$/'], 
            'product_quantity'=>['required', 'regex:/^[0-9]+$/'], 
            'product_discount'=>['required', 'regex:/^[0-9]+$/'], 
        ]);
    }
    public function addProduct(){
        $this->validate([
            'product_title'=>['required', 'not_regex:/^[0-9]+$/'],
            'product_description'=>['required', 'not_regex:/^[0-9]+$/'],
            'product_image'=>'required|image|mimes:jpeg,jpg,png',
            'category_id'=>'required',
            'product_price'=>['required', 'regex:/^[0-9]+$/'], 
            'product_quantity'=>['required', 'regex:/^[0-9]+$/'], 
            'product_discount'=>['required', 'regex:/^[0-9]+$/'], 
        ]);
        $products = new Product();
        $products->product_title = $this->product_title;
        $products->product_description = $this->product_description;
        $products->product_quantity = $this->product_quantity;
        $products->category_id = $this->category_id;
        $products->product_price = $this->product_price;
        $products->product_discount = $this->product_discount;
        
        // image Upload
        $fileName = time().'_niraj.'.$this->product_image->getClientOriginalExtension();
        $filePath = $this->product_image->storeAS('upload',$fileName,'public');
        $products->product_image = "/storage/".$filePath;
        $products->save();
        $this->resetFields();
        
    }
    public function resetFields(){
        $this->reset(['product_title','product_description','product_quantity','category_id','product_price','product_discount','product_image']);
    }
}
