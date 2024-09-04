<?php

namespace App\Models\Office;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = ['place_id', 'number', 'section', 'capacity', 'status', 'info', 'created_at', 'updated_at'];

    // Place
    public function place() : Relation
    {
        return $this->belongsTo(Place::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
