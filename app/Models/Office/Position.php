<?php

namespace App\Models\Office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'title', 'position_number', 'num_of_pos', 'desc', 'type', 'status'];

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
}
