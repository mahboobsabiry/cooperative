<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'phone2', 'address', 'info', 'from_date', 'to_date', 'doc_number'];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
