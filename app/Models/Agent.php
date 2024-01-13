<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name', 'phone', 'phone2', 'address', 'info'];

    public function company(): Relation
    {
        return $this->belongsTo(Company::class);
    }
}
