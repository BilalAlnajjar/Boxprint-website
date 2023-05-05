<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'carts';



    public function products(){
        return $this->belongsToMany(Product::class,'cart_products')->withPivot('image_content','width','height','price','type','image_logo','company_name','phone','website','email',
            'social_media_details','more_details','number_pages','input_number','print_faces','assembly_type','open_note','sinuses'
        ,'thermal_packaging','number_creases','edges','cover_thickness');
    }


}
