<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'color',
        'quantity',
        'catagory',
        'image',
        'image2',
        'image3',
        'detelse',
    ];
    protected $casts = [
        'color' => 'array',
    ];
}
