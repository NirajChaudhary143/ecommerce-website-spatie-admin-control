<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'category_name'
    ];
    protected $table ="categories";
    protected $primaryKey = 'category_id';

    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }
}
