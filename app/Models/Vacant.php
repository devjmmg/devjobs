<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{

    // versión < 10
    // protected $dates = [
    //     'last_day'
    // ];

    // versión >= 10
    protected $casts = [
        'last_day' => 'date',
        'published' => 'boolean'
    ];

    protected $fillable = [
        'published',
        'title',
        'salary_id',
        'category_id',
        'enterprise',
        'last_day',
        'description',
        'image',
        'user_id'
    ];
}
