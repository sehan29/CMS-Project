<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //

    use HasFactory;

    protected $fillable = ['user_id', 'category', 'details', 'rating', 'division', 'priority', 'status', 'notes'];

    // Status constants
    const STATUS_PENDING = 0;
    const STATUS_ASSIGNED = 1;
    const STATUS_RESOLVED = 2;
    const STATUS_OVER_DUE = 4;

    // Define the relationship to the attachments
    public function Documents()
    {
        return $this->hasMany(Documents::class, 'complaint_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isAssigned()
    {
        return $this->status === self::STATUS_ASSIGNED;
    }

    public function isResolved()
    {
        return $this->status === self::STATUS_RESOLVED;
    }

    public function isOverdue()
    {
        return $this->status === self::STATUS_OVER_DUE;
    }
}
