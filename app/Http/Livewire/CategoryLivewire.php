<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryLivewire extends Component
{
    public function render()
    {
        return view('livewire.category-livewire');
    }
    public function index(){
        return view('admin.category');
    }
}
