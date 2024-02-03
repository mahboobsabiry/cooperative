<?php

namespace App\Models\Office;

use App\Models\Warehouse\Assurance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'name', 'tin', 'type', 'background', 'status', 'created_at', 'updated_at'];

    public function agent(): Relation
    {
        return $this->belongsTo(Agent::class);
    }

    // Has Many Assurance
    public function assurances() : HasMany
    {
        return $this->hasMany(Assurance::class);
    }
}
