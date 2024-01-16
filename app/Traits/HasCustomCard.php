<?php

namespace App\Traits;

use App\Models\Card;

trait HasCustomCard {
    public static function bootHasCustomCard()
    {
        static::deleting(function ($model) {
            $model->deleteCard();
        });
    }

    public function custom_card()
    {
        return $this->morphOne(Card::class, 'transaction');
    }

    public function storeCard($path)
    {
        $custom_card = $this->custom_card()->create(['path' => $path]);
        return $custom_card;
    }

    public function updateCard($path)
    {
        if ($this->custom_card()) {
            $this->custom_card()->delete();
        }
        $this->storeCard($path);
    }

    public function deleteCard()
    {
        if ($this->custom_card()) {
            $this->custom_card()->delete();
        }
    }

    public function getCardAttribute()
    {
        $custom_card = $this->custom_card;
        if (!$custom_card) {
            return null;
        }
        return asset('storage/' . $custom_card->path);
    }
}
