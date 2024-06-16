<?php

namespace App\Models\Asycuda;

use App\Models\Photo;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class CalExp extends Model
{
    use HasFactory, HasPhoto;

    public $table = 'cal_exp';

    protected $fillable = ['user_id', 'cal_id', 'company_name', 'company_tin', 'license_number', 'owner_name', 'owner_phone', 'export_date', 'expire_date', 'address', 'status', 'info'];

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }

    public function cal(): Relation
    {
        return $this->belongsTo(COAL::class, 'cal_id', 'id');
    }
}
