<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'brand',
        'year',
        'price',
        'description',
        'transmission',
        'fuel_type',
        'engine_capacity',
        'image',
    ];

    protected $casts = [
        'image' => 'array', // <-- Add this cast
    ];
}
