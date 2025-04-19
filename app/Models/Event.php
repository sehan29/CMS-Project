<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'color',
        'user_id' // Ensure user_id is fillable
    ];

    protected $dates = ['start', 'end'];

    // Relationship: Event belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
