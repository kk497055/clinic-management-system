<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function branch_info() {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function priority_info() {
        return $this->belongsTo(ServiceFeeCategory::class, 'service_category', 'id');
    }


}

