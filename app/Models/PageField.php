<?php

namespace App\Models;

use App\Traits\HasField;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

/**
 * @mixin IdeHelperPageField
 */
class PageField extends Pivot implements HasMedia
{
    use InteractsWithMedia;
    use HasField;

    public $timestamps = false;

    protected $with = ['field', 'media'];

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('file')
            ->acceptsMimeTypes([
                // taken from https://www.freeformatter.com/mime-types-list.html
                'image/jpeg', 'image/x-citrix-jpeg', // jpeg, jpg
                'image/png', 'image/x-citrix-png', 'image/x-png', // png
                'image/gif', // gif
                'image/svg+xml', // svg
                'application/pdf', // pdf
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword', // word
                'application/vnd.ms-excel', 'application/vnd.ms-excel.sheet.binary.macroenabled.12', 'application/vnd.ms-excel.sheet.macroenabled.12', // excel (old formats)
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // excel (new xlsx format)
                'application/vnd.ms-powerpoint', 'application/vnd.ms-powerpoint.presentation.macroenabled.12', // ppt (old formats),
                'application/vnd.openxmlformats-officedocument.presentationml.presentation' // ppt (new pptx format)
            ])
            ->acceptsFile(fn (File $file) => $file->size <= 10 * 1024 * 1024);
    }
}
