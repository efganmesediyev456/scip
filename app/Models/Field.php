<?php

namespace App\Models;

use App\Casts\LocalizedObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperField
 */
class Field extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const TYPES = [
        'string' => 1,
        'number' => 2,
        'radio' => 3,
        'editor' => 4,
        'textarea' => 5,
        'select' => 6,
        'multiselect' => 7,
        'gallery' => 8,
        'date' => 9,
        'date_range' => 10,
        'file' => 11,
        'files' => 12,
        'url' => 13,
        'active_url' => 14,
        'checkbox' => 15,
        'range' => 16
    ];

    public const GROUPS = [
        'page' => 1,
        'post' => 2
    ];

    protected $casts = [
        'required' => 'boolean',
        'shown_on_table' => 'boolean',
        'name' => LocalizedObject::class,
        'placeholder' => LocalizedObject::class,
        'translated' => 'boolean',
        'field_group_type' => 'integer',
        'field_group_value' => 'integer'
    ];

    protected $with = [
        'values'
    ];

    public function hasValues(): bool
    {
        return in_array($this->type, [
            self::TYPES['select'],
            self::TYPES['radio'],
            self::TYPES['multiselect']
        ]);
    }

    public function hasMultipleValues(): bool
    {
        return in_array($this->type, [
            self::TYPES['multiselect'],
            self::TYPES['files']
        ]);
    }

    public function canBeTranslated(): bool
    {
        return in_array($this->type, [
            self::TYPES['string'],
            self::TYPES['editor'],
            self::TYPES['textarea']
        ]);
    }

    public function values(): HasMany
    {
        return $this->hasMany(FieldValue::class);
    }
}
