<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReconsiderationNote extends Model
{
    protected $fillable = ['complaint_id', 'notes', 'request_number'];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
