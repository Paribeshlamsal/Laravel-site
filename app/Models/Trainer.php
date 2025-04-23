<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    // Define the relationship with the Appointment model
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
