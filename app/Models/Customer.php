<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'age',
    ];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'customer_id');
    }
}
