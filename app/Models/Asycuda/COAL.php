<?php

namespace App\Models\Asycuda;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\Relation;

// Companies Activity License Model
class COAL extends Model
{
    use HasFactory;

    public $table = 'coal';

    protected $fillable = [
        'user_id', 'company_name', 'company_tin', 'license_number',
        'owner_name', 'owner_phone',
        'export_date', 'expire_date',
        'phone', 'email', 'address', 'status', 'info'
    ];

    public function user(): Relation
    {
        return $this->belongsTo(User::class);
    }

    // Morph Document
    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'transaction');
    }
}
