<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PatientDetail extends Model
{
    protected $primaryKey = 'patient_detail_id';
    public function patient() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
