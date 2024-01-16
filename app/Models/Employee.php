<?php

namespace App\Models;

use App\Traits\HasCustomCard;
use App\Traits\HasPhoto;
use App\Traits\HasTazkira;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class Employee extends Model
{
    use HasFactory, HasPhoto, HasTazkira, HasCustomCard;

    protected $fillable = [
        'position_id', 'hostel_id', 'start_job', 'position_code', 'name', 'last_name', 'father_name', 'gender',
        'emp_number', 'appointment_number', 'appointment_date', 'last_duty', 'birth_year',
        'education', 'prr_npr', 'prr_date',
        'phone', 'phone2', 'email',
        'main_province', 'main_district', 'current_province', 'current_district',
        'introducer', 'info','status', 'background',
        'on_duty', 'start_duty', 'duty_doc_number', 'duty_position',
    ];

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }

    // Morph Card
    public function custom_card(): MorphOne
    {
        return $this->morphOne(Card::class, 'transaction');
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
