<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [];

    // Belongs to Category
    public function category() : Relation
    {
        return $this->belongsTo(Category::class);
    }
}
