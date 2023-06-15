<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class DisplayProduct extends Component
{
    public $products;
    public function render()
    {
        return view('livewire.display-product');
    }
    public function mount(){
        $this->products = Product::all();
    }
}
