<?php

namespace App\Models\Admin\Finance;

use App\Models\Finance\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['currency_id', 'title', 'code', 'amount', 'status', 'info'];

    // Currency
    public function currency() : Relation
    {
        return $this->belongsTo(Currency::class);
    }
}
