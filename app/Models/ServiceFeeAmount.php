<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeeAmount extends Model
{
    public function service_fee_category(){
        return $this->belongsTo(ServiceFeeCategory::class, 'service_category_id', 'id');
    }

    public function service_fee_main(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
