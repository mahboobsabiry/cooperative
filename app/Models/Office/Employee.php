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
        'position', 'name', 'last_name', 'father_name',
        'emp_code', 'nid_number', 'birth_date',
        'phone', 'phone2', 'email',
        'address', 'signature', 'info','status'
    ];

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }
}
