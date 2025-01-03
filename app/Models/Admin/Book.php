<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id', 'name', 'author_name', 'closet_number', 'shelf_number', 'status', 'info'];

    // Belongs to Category
    public function subject() : Relation
    {
        return $this->belongsTo(Subject::class);
    }
}
