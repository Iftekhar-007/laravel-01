<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'description',
    'price',
    'stock',
    'images', // json array of image URLs
];

protected $casts = [
        'images' => 'array', // multiple images automatic array hisebe handle hobe
    ];
}
