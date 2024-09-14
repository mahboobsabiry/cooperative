<?php

namespace App\Models\Asycuda;

use App\Models\Office\Employee;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class AsycudaUser extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'place_id', 'user', 'password', 'roles', 'end_date', 'status', 'info', 'created_at', 'updated_at'];

    public function employee() : Relation
    {
        return $this->belongsTo(Employee::class);
    }

    // Place
    public function place() : Relation
    {
        return $this->belongsTo(Place::class);
    }

    // Have Many Resumes
    public function resumes()
    {
        return $this->hasMany(AsyUserResume::class, 'asy_user_id', 'id');
    }
}
