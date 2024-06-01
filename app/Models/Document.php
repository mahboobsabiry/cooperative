<?php

namespace App\Models;

use App\Models\Office\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['position_id', 'receiver', 'cc', 'type', 'subject', 'doc_type', 'doc_number', 'doc_date', 'appendices', 'status', 'info'];

    // Belongs to
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // Morph File
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'transaction');
    }

    // Get CC
    public function cc()
    {
        return explode(', ', $this->cc);
    }
}
