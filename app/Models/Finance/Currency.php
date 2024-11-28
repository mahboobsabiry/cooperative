<?php

namespace App\Models\Finance;

use App\Models\Admin\Finance\Budget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'symbol', 'status', 'info'];

    // Has Many Budget
    public function budgets() : HasMany
    {
        return $this->hasMany(Budget::class);
    }
}
