<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProduct extends Pivot
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'cart_products';

    protected $appends = ['measuring','papers','weights','numbers','cutLabels','colors'
        ,'print_faces','assembly_type','open_note','sinuses','thermal_packaging','number_creases'
        ,'edges','cover_thickness','sticker','structure','box','base','tape_color'];


    protected function setKeysForSaveQuery($query)
    {
        $query->where('cart_id', $this->order_id)
            ->where('product_id', $this->product_id);

        return $query;
    }


    public function measuring(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? \GuzzleHttp\json_decode($value, true) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );

    }

    public function papers(): Attribute
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

    public function tapeColor(): Attribute
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

}
