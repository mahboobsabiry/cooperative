<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Exit Door Transit & Export Vehicles
class EDTrex extends Model
{
    use HasFactory;

    public $table = 'ed_trex';

    protected $fillable = [
        'is_tr', 'c_name', 'vp_number', 'vpt_number',
        'good_name', 'bx_total', 'bx_total_tx', 'weight', 'enex', 'desc',
        'is_returned', 'return_date', 'exit_again', 'ea_date'
    ];
}
