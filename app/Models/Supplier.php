<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function city() {
        return $this->belongsTo(city::class, 'city', 'id');
    }
}
