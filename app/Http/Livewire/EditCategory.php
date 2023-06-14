<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $category_name,$c_id,$check="edit";
    public function render()
    {
        return view('livewire.edit-category');
    }
    public function editCategory(){
        $category=Category::find($this->c_id);
        $category->category_name = $this->category_name;
        $category->save();
        $this->check="view";
    }
    public function checkValueToFalse(){
        $this->check='view';
    }
}
