<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'phone2', 'address', 'background', 'info',
        'from_date', 'to_date', 'doc_number',
        'from_date2', 'to_date2', 'doc_number2',
        'from_date3', 'to_date3', 'doc_number3',
        'status'
    ];

    // Has Many Companies
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
