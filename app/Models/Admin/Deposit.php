<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'title', 'amount', 'year', 'month', 'month_number', 'status', 'info'];

    // Belongs to Category
    public function member() : Relation
    {
        return $this->belongsTo(Member::class);
    }
}
