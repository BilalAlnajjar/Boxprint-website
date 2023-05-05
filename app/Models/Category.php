<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function products(){
        return $this->hasMany(Product::class);
    }

    public function similer_products($product_id){
        return $this->products()->whereNot('id',$product_id)->take(4)->get();
    }
}
