<?php

namespace App\Models;

use App\Models\Asycuda\AsycudaUser;
use App\Models\Office\Hostel;
use App\Models\Office\Leave;
use App\Models\Office\Position;
use App\Models\Office\Resume;
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
        'position', 'name', 'username', 'father_name', 'gender',
        'birth_year', 'education',
        'phone', 'phone2', 'email',
        'main_address', 'current_address', 'info','status'
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

    // Has One User
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
