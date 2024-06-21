<?php

namespace App\Models\Examination;

use App\Models\Office\Company;
use App\Models\Office\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'doc_number', 'doc_date', 'property_name', 'property_code', 'ts_code', 'weight', 'start_date', 'end_date', 'status', 'info'];

    /**
     * Belongs to User Model
     */
    public function user() : Relation
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Belongs to Employee Model
     */
    public function company() : Relation
    {
        return $this->belongsTo(Company::class);
    }
}
