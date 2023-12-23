<?php

namespace App\Traits;

use App\Models\Tazkira;

trait HasTazkira {
    public static function bootHasTazkira()
    {
        static::deleting(function ($model) {
            $model->deleteTaz();
        });
    }

    public function tazkira()
    {
        return $this->morphOne(Tazkira::class, 'transaction');
    }

    public function storeTaz($path)
    {
        $tazkira = $this->tazkira()->create(['path' => $path]);
        return $tazkira;
    }

    public function updateTaz($path)
    {
        if ($this->tazkira) {
            $this->tazkira->delete();
        }
        $this->storeTaz($path);
    }

    public function deleteTaz()
    {
        if ($this->tazkira) {
            $this->tazkira->delete();
        }
    }

    public function getTazAttribute()
    {
        $tazkira = $this->tazkira;
        if (!$tazkira) {
            return null;
        }
        return asset('storage/' . $tazkira->path);
    }
}
