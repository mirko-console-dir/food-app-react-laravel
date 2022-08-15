<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'image_primary', 'image_secondary', 'image_ter', 'video_mp4', 'product_code', 'category_id', 'tax_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function iva()
    {
        return $this->belongsTo(Iva::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
