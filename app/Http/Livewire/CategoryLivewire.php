<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryLivewire extends Component
{
    public $category_name,$categories,$check='add',$c_id;
    public function render()
    {
        return view('livewire.category-livewire');
    }
    public function index(){
        return view('admin.category');
    }
    public function addCategory(){
        $this->validate([
            'category_name'=>'required|unique:categories,category_name'
        ]);
        Category::create([
            'category_name' => $this->category_name
        ]);
        $this->resetFields();
        $this->mount();
        $this->check = "view";

    }
    public function resetFields(){
        $this->reset('category_name');
    }

    // Validation
    public function updated($field){
        $this->validateOnly($field,[
            'category_name'=>'required|unique:categories,category_name'
        ]);
    }
    public function mount(){
        $this->categories = Category::all();
    }
    public function checkValueToTrue(){
        $this->check='add';
    }
    public function checkValueToFalse(){
        $this->check='view';
        
    }
    public function deleteCategory($id){
        // $this->middleware('isAdmin');
        // Category::find($id)->delete();
        // $this->mount();
        $category = Category::find($id);

        // Check if the user is authorized to delete the category
        if(!auth()->user()->roles->contains('name','admin')){
            abort(403, 'Unauthorized action.');
        }

        $category->delete();
        $this->mount();
    }
    
    public function editCategory($id){
        $category = Category::find($id);
        $this->c_id=$id;
        $this->category_name=$category->category_name;
        $this->check='edit';
    }
}
