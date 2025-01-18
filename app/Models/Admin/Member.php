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

    // Years
    public static function years() {
        $years = ['1403', '1404', '1405', '1406', '1407', '1408', '1409', '1410', '1411', '1412', '1413', '1414', '1415', '1416', '1417', '1418', '1419', '1420'];
        return $years;
    }

    // Months
    public static function months() {
        $months = ['حمل', 'ثور', 'جوزا', 'سرطان', 'اسد', 'سنبله', 'میزان', 'عقرب', 'قوس', 'جدی', 'دلو', 'حوت'];
        return $months;
    }
}
