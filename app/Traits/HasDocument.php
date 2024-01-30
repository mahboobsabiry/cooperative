<?php

namespace App\Traits;

use App\Models\Document;

trait HasDocument {
    public static function bootHasDoc()
    {
        static::deleting(function ($model) {
            $model->deleteDocument();
        });
    }

    public function doc()
    {
        return $this->morphMany(Document::class, 'transaction');
    }

    public function storeDocument($path)
    {
        $doc = $this->doc()->create(['path' => $path]);
        return $doc;
    }

    public function updateDocument($path)
    {
        if ($this->doc) {
            $this->doc->delete();
        }
        $this->storeDocument($path);
    }

    public function deleteDocument()
    {
        if ($this->doc) {
            $this->doc->delete();
        }
    }

    public function getDocumentAttribute()
    {
        $doc = $this->doc;
        if (!$doc) {
            return null;
        }
        return asset('storage/' . $doc->path);
    }
}
