<?php
declare(strict_types = 1);

namespace SnoerenDevelopment\LaravelEloquentUuid;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait UsesUuid
{
    /**
     * Boot the UUID trait.
     *
     * @return void
     */
    protected static function bootUsesUuid(): void
    {
        static::creating(function (Model $model): void {
            if (!filled($model->getKey())) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return boolean
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}