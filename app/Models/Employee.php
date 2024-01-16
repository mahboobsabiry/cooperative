<?php

namespace App\Models;

use App\Traits\HasPhoto;
use App\Traits\HasTazkira;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class Employee extends Model
{
    use HasFactory, HasPhoto, HasTazkira;

    protected $fillable = [
        'position_id', 'hostel_id', 'start_duty', 'position_code', 'name', 'last_name', 'father_name', 'gender',
        'emp_number', 'appointment_number', 'appointment_date', 'last_duty', 'birth_year',
        'education', 'prr_npr', 'prr_date',
        'phone', 'phone2', 'email',
        'main_province', 'main_district', 'current_province', 'current_district', 'introducer', 'info',
        'on_duty', 'duty_position', 'background', 'status'
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

    // Hostel
    public function hostel(): Relation
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }
}
