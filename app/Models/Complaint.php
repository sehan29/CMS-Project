<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //

    use HasFactory;
    
    protected $fillable = ['user_id', 'category', 'details', 'rating', 'division', 'priority', 'status', 'notes','feedback','reconsideration_count','can_reconsider','updated_at'];

    // Status constants
    const STATUS_PENDING = 0;
    const STATUS_ASSIGNED = 1;
    const STATUS_RECONSIDERATION = 3;
    const STATUS_RESOLVED = 2;
    const STATUS_OVER_DUE = 4;


    // Priority constants
    const PRIORITY_LOW = 'low';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_HIGH = 'high';
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

    public function reconsiderationNotes()
    {
        return $this->hasMany(ReconsiderationNote::class);
    }

    public function isResolved()
    {
        return $this->status === self::STATUS_RESOLVED;
    }

    public function isReconsideration()
    {
        return $this->status === self::STATUS_RECONSIDERATION;
    }

    public function isOverdue()
    {
        return $this->status === self::STATUS_OVER_DUE;
    }

    // Accessors for better status handling
    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'Pending';
            case self::STATUS_ASSIGNED:
                return 'Assigned';
            case self::STATUS_RESOLVED:
                return 'Resolved';
            case self::STATUS_RECONSIDERATION:
                return 'Reconsideration';
            case self::STATUS_OVER_DUE:
                return 'Overdue';
            default:
                return 'Unknown';
        }
    }

    public function getStatusBadgeColorAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'warning';
            case self::STATUS_ASSIGNED:
                return 'info';
            case self::STATUS_RESOLVED:
                return 'success';
            case self::STATUS_RECONSIDERATION:
                return 'danger';
            case self::STATUS_OVER_DUE:
                return 'danger';
            default:
                return 'secondary';
        }
    }

    public function getPriorityBadgeColorAttribute()
    {
        switch ($this->priority) {
            case self::PRIORITY_HIGH:
                return 'danger';
            case self::PRIORITY_MEDIUM:
                return 'warning';
            case self::PRIORITY_LOW:
                return 'success';
            default:
                return 'secondary';
        }
    }

    // Check if reconsideration is allowed
    public function getCanReconsiderAttribute()
    {
        return $this->isResolved() && $this->reconsideration_count < 3;
    }
}
