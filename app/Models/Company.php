<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'name', 'tin', 'type', 'background', 'status', 'created_at', 'updated_at'];

    public function agent(): Relation
    {
        return $this->belongsTo(Agent::class);
    }
}
