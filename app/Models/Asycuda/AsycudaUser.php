<?php

namespace App\Models\Asycuda;

use App\Models\Employee;
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
}
