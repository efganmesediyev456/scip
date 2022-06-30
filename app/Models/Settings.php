<?php

namespace App\Models;

use App\Casts\LocalizedObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

/**
 * @mixin IdeHelperSettings
 */
class Settings extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'value' => LocalizedObject::class,
        'type' => 'integer'
    ];

    public const TYPES = [
        'string' => 1,
        'image' => 2,
        'bool' => 3,
        'url' => 4,
        'text' => 5
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->acceptsFile(fn (File $file) => $file->size <= 5 * 1024 * 1024);
    }
}
