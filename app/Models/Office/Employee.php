<?php

namespace App\Models\Office;

use App\Models\Asycuda\AsycudaUser;
use App\Models\File;
use App\Models\Photo;
use App\Models\User;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class Employee extends Model
{
    use HasFactory, HasPhoto;

    protected $fillable = [
        'position_id', 'hostel_id', 'start_job', 'ps_code_id', 'name', 'last_name', 'father_name', 'gender',
        'emp_number', 'nid_number', 'appointment_number', 'appointment_date', 'last_duty', 'birth_year',
        'education', 'prr_npr', 'prr_date',
        'phone', 'phone2', 'email',
        'main_province', 'main_district', 'current_province', 'current_district',
        'introducer', 'signature', 'info','status',
        'on_duty', 'start_duty', 'duty_doc_number', 'duty_doc_date', 'duty_position',
    ];

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }

    // Morph Document
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'transaction');
    }

    // Morph Document
    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class);
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

    // Has One Asycuda User
    public function asycuda_user()
    {
        return $this->hasOne(AsycudaUser::class);
    }

    // Has One User
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Employee Leaves
    public function leaves() : HasMany
    {
        return $this->hasMany(Leave::class);
    }

    // Belongs to One Position Code
    public function position_code()
    {
        return $this->belongsTo(PositionCode::class, 'ps_code_id');
    }
}
