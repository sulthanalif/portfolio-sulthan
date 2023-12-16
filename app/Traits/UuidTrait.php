<?php
namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    protected static function bootUuidTrait()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }
}
