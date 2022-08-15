<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function variants()
    {
        return $this->belongsToMany(Variant::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class);
    }
}
