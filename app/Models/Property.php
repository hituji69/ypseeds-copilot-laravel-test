<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'address',
        'area',
        'nearest_station',
        'image_path',
        'equipment_conditions',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];
}
