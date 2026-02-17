<?php

namespace App\Models;

use App\Models\Candidate;
use App\Models\Category;
use App\Models\Salary;
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function hasApplied($user_id)
    {
        return $this->candidates()->where('user_id', $user_id)->exists();
    }

}
