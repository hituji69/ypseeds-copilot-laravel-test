<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'type',
        'address',
        'area',
        'nearest_station',
        'image_path'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];
}
