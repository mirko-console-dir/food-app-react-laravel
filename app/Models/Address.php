<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
    }
}
