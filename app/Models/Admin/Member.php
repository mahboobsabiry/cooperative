<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['avatar', 'name', 'father_name', 'position', 'phone', 'phone2', 'email', 'address', 'deposit_amount', 'status', 'info'];

    // Has Many Deposits
    public function deposits() : HasMany
    {
        return $this->hasMany(Deposit::class);
    }

    // Get Image Attribute
    public function getImageAttribute()
    {
        $image = asset('assets/images/members/' . $this->avatar);
        return $image;
    }
}
