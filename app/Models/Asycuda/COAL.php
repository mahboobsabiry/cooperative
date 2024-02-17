<?php

namespace App\Models\Asycuda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Companies Activity License Model
class COAL extends Model
{
    use HasFactory;

    public $table = 'coal';

    protected $fillable = [
        'user_id', 'company_name', 'company_tin', 'license_number',
        'owner_name', 'owner_phone',
        'export_date', 'expire_date',
        'phone', 'email', 'address', 'status', 'info'
    ];
}
