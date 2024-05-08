<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'subject', 'doc_type', 'doc_number', 'doc_date', 'appendices', 'status', 'info', 'transaction_type', 'transaction_id'];

    public function transaction(): MorphTo
    {
        return $this->morphTo();
    }

    // Morph Document
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'transaction');
    }
}
