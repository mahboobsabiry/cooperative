<?php

namespace App\Models\Office;

use App\Models\Document;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 'place_id', 'title',
        'position_number', // Position Number for ex: 2 is Head of Custom
        'num_of_pos', // Number of Position
        'desc',
        'status'
    ];

    public static function tree()
    {
        $allPositions = Position::with('employees')->get();
        $rootPositions = $allPositions->where('parent_id', 0);

        self::formatTree($rootPositions, $allPositions);

        return $rootPositions;
    }

    protected static function formatTree($positions, $allPositions)
    {
        foreach ($positions as $position) {
            $position->children = $allPositions->where('parent_id', $position->id)->values();

            if ($position->children->isNotEmpty()) {
                self::formatTree($position->children, $allPositions);
            }
        }
    }

    // Place
    public function place() : Relation
    {
        return $this->belongsTo(Place::class);
    }

    // Parent
    public function parent()
    {
        return $this->belongsTo(Position::class, 'parent_id');
    }

    // Administrations
    public function children()
    {
        return $this->hasMany(Position::class, 'parent_id');
    }

    // Employee
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'position_id');
    }

    // Morph Document
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    // Has Many Codes
    public function codes()
    {
        return $this->hasMany(PositionCode::class);
    }
}
