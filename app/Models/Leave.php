<?php

namespace App\Models;

use App\Models\Office\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'leave_type', 'start_date', 'end_date', 'reason', 'created_at', 'updated_at'];

    public function employee() : Relation
    {
        return $this->belongsTo(Employee::class);
    }
}
