<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryLivewire extends Component
{
    public $category_name,$categories,$check=true;
    public function render()
    {
        return view('livewire.category-livewire');
    }
    public function index(){
        return view('admin.category');
    }
    public function addCategory(){
        $this->validate([
            'category_name'=>'required'
        ]);
        Category::create([
            'category_name' => $this->category_name
        ]);
        $this->resetFields();
        $this->check = false;

    }
    public function resetFields(){
        $this->reset('category_name');
    }

    // Validation
    public function updated($field){
        $this->validateOnly($field,[
            'category_name'=>'required'
        ]);
    }
    public function mount(){
        $this->categories = Category::all();
    }
    public function checkValueToTrue(){
        $this->check=true;
    }
    public function checkValueToFalse(){
        $this->check=false;
    }
}
