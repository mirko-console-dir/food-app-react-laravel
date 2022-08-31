<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'image_primary', 'image_secondary', 'image_ter', 'video_mp4', 'product_code', 'category_id', 'price','tax_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
    }

   
}
