<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //

    use HasFactory;

    protected $fillable = ['user_id', 'category', 'details','attachments'];

    // Define the relationship to the attachments
    public function Documents()
    {
        return $this->hasMany(Documents::class,'complaint_id');
    }

}
