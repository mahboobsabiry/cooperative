<?php

namespace App\Models\Office;

use App\Models\Photo;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class AgentColleague extends Model
{
    use HasFactory, HasPhoto;

    protected $fillable = [
        'agent_id', 'name', 'phone', 'phone2', 'id_number', 'address',
        'status', 'info', 'signature',
        'from_date', 'to_date', 'doc_number', 'background'
    ];

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }

    // Belongs to Agent
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
