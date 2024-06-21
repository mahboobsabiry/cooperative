<?php

namespace App\Models\Office;

use App\Models\Photo;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class Notice extends Model
{
    use HasFactory, HasPhoto;

    /**
     * Notice! 1 Is advice, 2 is Notice, 3 is Written Notice, 4 Is Fire
     */
    protected $fillable = ['employee_id', 'reason', 'notice_text', 'notice'];

    /**
     * Notice belongs to Employee
     */
    public function employee() : Relation
    {
        return $this->belongsTo(Employee::class);
    }

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }
}
