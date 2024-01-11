<?php

namespace App\Models;

use App\Traits\HasPhoto;
use App\Traits\HasTazkira;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Employee extends Model
{
    use HasFactory, HasPhoto, HasTazkira;

    protected $fillable = [
        'position_id', 'name', 'last_name', 'father_name', 'gender',
        'emp_number', 'appointment_number', 'appointment_date', 'last_duty', 'birth_year',
        'education', 'prr_npr', 'prr_date',
        'phone', 'phone2', 'email',
        'main_province', 'current_province', 'info',
        'on_duty', 'main_position', 'status'
    ];

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }

    // Morph Photo
    public function tazkira(): MorphOne
    {
        return $this->morphOne(Tazkira::class, 'transaction');
    }

    // Position
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
