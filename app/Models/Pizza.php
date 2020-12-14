<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    // turn toppings into a JSON string in the database
    // then turn it into an array on the site itself
    protected $casts = [
        'toppings' => 'array',
    ];

}
