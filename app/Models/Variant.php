<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = ['product_id','image_primary','name','description', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
    }
}

