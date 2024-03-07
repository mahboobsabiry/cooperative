<?php

namespace App\Models\Asycuda;

use App\Models\Photo;
use App\Models\User;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

// Companies Activity License Model
class COAL extends Model
{
    use HasFactory, HasPhoto;

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

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }
}
