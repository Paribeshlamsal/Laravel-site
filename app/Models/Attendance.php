<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'member_id',
        'date',
        'check_in',
        'check_out',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Trainer model
     */
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
