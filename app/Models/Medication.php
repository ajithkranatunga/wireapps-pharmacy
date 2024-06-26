<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'expire_date',
    ];

    protected $casts = [
        'expire_date' => 'datetime'
    ];

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class);
    }
}
