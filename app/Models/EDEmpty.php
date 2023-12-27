<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Exit Door Empty Vehicles
class EDEmpty extends Model
{
    use HasFactory;

    public $table = 'ed_empty';

    protected $fillable = [
        'c_name', 'vp_number', 'vpt_number', 'enex', 'desc'
    ];
}
