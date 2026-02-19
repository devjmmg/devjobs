<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'cv',
        'user_id',
        'vacant_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
