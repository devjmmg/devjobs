<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    protected $fillable = [
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
