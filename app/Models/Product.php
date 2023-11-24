<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'price', 'description', 'category', 'image',
    ];

    protected $hidden = ['rate', 'count'];
    protected $appends = ['rating']; 

    public function getRatingAttribute()
    {
        return [
            'rate' => $this->attributes['rate'],
            'count' => $this->attributes['count'],
        ];
    }
}
