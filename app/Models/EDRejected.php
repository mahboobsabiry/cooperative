<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Exit Door Rejected Vehicles
class EDRejected extends Model
{
    use HasFactory;

    public $table = 'ed_rejected';

    protected $fillable = [
        'c_name', 'good_name', 'vp_number', 'vpt_number', 'desc'
    ];
}
