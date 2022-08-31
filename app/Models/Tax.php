<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
  
}
