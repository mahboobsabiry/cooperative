<?php

namespace App\Models\Asycuda;

use App\Models\Office\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsycudaUser extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'user', 'password', 'roles', 'end_date', 'status', 'info', 'created_at', 'updated_at'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Have Many Resumes
    public function resumes()
    {
        return $this->hasMany(AsyUserResume::class, 'asy_user_id', 'id');
    }
}
