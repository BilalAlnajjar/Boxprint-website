<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['measure','paper','weights','numbers','cutLabels','colors'
        ,'print_faces','assembly_type','open_note','sinuses','thermal_packaging','number_creases'
        ,'edges','cover_thickness','sticker','structure','box','base','tape_color'];

    public function measure(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );

    }

    public function paper(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function weights(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function numbers(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function cutLabels(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function colors(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function printFaces(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function tapeColor(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function assemblyType(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function openNote(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function sinuses(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function thermalPackaging(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function numberCreases(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function edges(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function coverThickness(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function numberPages(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function inputNumber(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function sticker(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function structure(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function box(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function base(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }



    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_products','order_id')
            ->using(OrderProduct::class);
    }
}
