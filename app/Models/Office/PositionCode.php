<?php

namespace App\Models\Office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id', 'code', 'status', 'info'
    ];

    // Belongs to Position
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // Has One Employee
    public function employee()
    {
        return $this->hasOne(Employee::class, 'ps_code_id');
    }
}
