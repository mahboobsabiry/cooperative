<?php

namespace App\Models\Warehouse;

use App\Models\Office\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Assurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'good_name', 'assurance_total',
        'inquiry_number', 'inquiry_date',
        'bank_tt_number', 'bank_tt_date',
        'assurance_expire_date',
        'status', 'reason',
        'created_at', 'updated_at'
    ];

    public function company() : Relation
    {
        return $this->belongsTo(Company::class);
    }
}
