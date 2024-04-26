<?php

namespace App\Models;

use App\Models\Asycuda\AsycudaUser;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class AsyUserExp extends Model
{
    use HasFactory, HasPhoto;

    protected $table = 'asy_users_exp';

    protected $fillable = ['asy_user_id', 'position', 'position_type', 'doc_number', 'doc_date', 'username', 'password', 'user_status', 'user_roles', 'info'];

    public function asy_user()
    {
        return $this->belongsTo(AsycudaUser::class);
    }

    // Morph Photo
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'transaction');
    }
}
