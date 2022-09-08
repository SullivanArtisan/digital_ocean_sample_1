<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price','manufacturer_id'
    ];

    public function manufacturers()
    {
        return $this->belongsTo('App\Manufacturer');
    }
}
