<?php

namespace App\Models\Asycuda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class CalExp extends Model
{
    use HasFactory;

    public $table = 'cal_exp';

    protected $fillable = ['user_id', 'cal_id', 'company_name', 'company_tin', 'license_number', 'owner_name', 'owner_phone', 'export_date', 'expire_date', 'address', 'status', 'info'];

    public function cal(): Relation
    {
        return $this->belongsTo(COAL::class, 'cal_id', 'id');
    }
}
