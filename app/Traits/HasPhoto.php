<?php

namespace App\Traits;

use App\Models\Photo;

trait HasPhoto {
    public static function bootHasPhoto()
    {
        static::deleting(function ($model) {
            $model->deleteImage();
        });
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'transaction');
    }

    public function storeImage($path)
    {
        $photo = $this->photo()->create(['path' => $path]);
        return $photo;
    }

    public function updateImage($path)
    {
        if ($this->photo) {
            $this->photo->delete();
        }
        $this->storeImage($path);
    }

    public function deleteImage()
    {
        if ($this->photo) {
            $this->photo->delete();
        }
    }

    public function getImageAttribute()
    {
        $photo = $this->photo;
        if (!$photo) {
            return null;
        }
        return asset('storage/' . $photo->path);
    }
}
