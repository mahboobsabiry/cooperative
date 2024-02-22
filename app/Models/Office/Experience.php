<?php

namespace App\Models\Office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'position', 'position_type', 'start_date', 'end_date', 'doc_number', 'document', 'status', 'info'];

    public function employee() : Relation
    {
        return $this->belongsTo(Employee::class);
    }
}
