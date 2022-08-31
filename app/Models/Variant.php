<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = ['tax_id','image_primary','name','description', 'price'];

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
}

