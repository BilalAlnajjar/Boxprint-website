<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,'order_products')
            ->using(OrderProduct::class)->withPivot('image_content','width','height','price','type','image_logo','company_name','phone','website','email',
                'social_media_details','more_details','number_pages','input_number','print_faces','assembly_type','open_note','sinuses'
                ,'thermal_packaging','number_creases','edges','cover_thickness');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
