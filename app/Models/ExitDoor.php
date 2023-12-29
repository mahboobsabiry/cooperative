<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExitDoor extends Model
{
    use HasFactory;

    protected $table = 'exit_door';

    // Fillable
    protected $fillable = [
        'exit_type', 'company_name', 'vp_number', 'vpt_number',
        'good_name', 'bx_total', 'bx_total_tx', 'weight', 'enex', 'desc',
        'is_returned', 'return_date', 'exit_again', 'ea_date'
    ];
}
