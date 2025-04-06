<?php

namespace App;

use Illuminate\Support\Str;

trait HasUUID
{
    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function initializeHasUuid()
    {
        $this->incrementing = false;
        $this->keyType = 'string';
    }
}
