<?php

namespace App\Models\Office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'section', 'place'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
