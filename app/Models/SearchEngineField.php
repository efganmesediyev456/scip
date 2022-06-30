<?php

namespace App\Models;

use App\Casts\LocalizedObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

/**
 * @mixin IdeHelperSearchEngineField
 */
class SearchEngineField extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $with = ['media'];

    protected $casts = [
        'title' => LocalizedObject::class,
        'description' => LocalizedObject::class,
        'keywords' => LocalizedObject::class
    ];

    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->acceptsFile(fn (File $file) => $file->size <= 2 * 1024 * 1024)
            ->acceptsMimeTypes([
                'image/jpeg', 'image/x-citrix-jpeg', // jpeg, jpg
                'image/png', 'image/x-citrix-png', 'image/x-png', // png
                'image/gif', // gif
            ]);
    }
}
