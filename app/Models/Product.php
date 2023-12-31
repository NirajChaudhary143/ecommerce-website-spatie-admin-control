<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $primaryKey ='id';
    protected $fillable =[
        'id',
        'product_title',
        'product_image',
        'product_description',
        'category_id',
        'product_price',
        'product_discount',
        'product_quantity'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
}
