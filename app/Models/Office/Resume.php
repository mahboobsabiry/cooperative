<?php

namespace App\Models\Office;

use App\Models\Photo;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class Resume extends Model
{
    use HasFactory, HasPhoto;

    protected $fillable = ['employee_id', 'position', 'position_type', 'start_date', 'end_date', 'doc_number', 'doc_date', 'info'];

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
