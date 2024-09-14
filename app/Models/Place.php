<?php

namespace App\Models;

use App\Models\Asycuda\AsycudaUser;
use App\Models\Office\Hostel;
use App\Models\Office\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'custom_code', 'status', 'info'];

    // Users
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    // Asycuda Users
    public function asycuda_users() : HasMany
    {
        return $this->hasMany(AsycudaUser::class);
    }

    // Positions
    public function positions() : HasMany
    {
        return $this->hasMany(Position::class);
    }

    // Hostels
    public function hostels() : HasMany
    {
        return $this->hasMany(Hostel::class);
    }
}
