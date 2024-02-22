<?php

namespace App\Models\Office;

use App\Models\Asycuda\AsycudaUser;
use App\Models\Document;
use App\Models\Photo;
use App\Models\User;
use App\Traits\HasDocument;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class Employee extends Model
{
    use HasFactory, HasPhoto, HasDocument;

    protected $fillable = [
        'position_id', 'hostel_id', 'start_job', 'position_code', 'name', 'last_name', 'father_name', 'gender',
        'emp_number', 'appointment_number', 'appointment_date', 'last_duty', 'birth_year',
        'education', 'prr_npr', 'prr_date',
        'phone', 'phone2', 'email',
        'main_province', 'main_district', 'current_province', 'current_district',
        'introducer', 'info','status',
        'on_duty', 'start_duty', 'duty_doc_number', 'duty_position',
    ];

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }

    // Morph Document
    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'transaction');
    }

    // Morph Document
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
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

    // Main Position Employees
    public function main_position()
    {
        return Employee::where('status', 0)->get();
    }

    // Duty Position Employees
    public function duty_position()
    {
        return Employee::where('status', 1)->get();
    }

    // Retired Employees
    public function retired()
    {
        return Employee::where('status', 2)->get();
    }

    // Fired Employees
    public function fired()
    {
        return Employee::where('status', 3)->get();
    }

    // Changed Employees
    public function changed()
    {
        return Employee::where('status', 4)->get();
    }

    // Suspended Employees
    public function suspended()
    {
        return Employee::where('status', 5)->get();
    }
}
