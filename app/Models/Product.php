<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $primaryKey ='product_id';
    protected $fillable =[
        'product_id',
        'product_title',
        'product_image',
        'product_description',
        'category_id',
        'product_price',
    ];

    protected function category(){
        return $this->belongsTo(Category::class,'category_id','product_id');
    }
}
