<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'order_products';



    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected function setKeysForSaveQuery($query)
    {
        $query->where('order_id', $this->order_id)
            ->where('product_id', $this->product_id);

        return $query;
    }
}
