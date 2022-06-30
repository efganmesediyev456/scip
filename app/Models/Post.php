<?php

namespace App\Models;

use App\Casts\LocalizedObject;
use App\Traits\HasSearchEngineField;
use App\Traits\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use HasFactory;
    use HasSearchEngineField;
    use HasVisits;

    public const TYPES = [
        'news' => 1,
        'slider' => 2,
        'details'=>3,
        'advantages'=>4,
        'maps'=>5,
        'qarabag'=>6,
        'advertisements'=>7,
        'photogallery'=>8,
        'videogallery'=>9,
        'missions'=>10,
        'fag'=>11,
        'links'=>12,
        'leadership'=>13,
        'reports'=>14,
        'lows'=>15,
        'grafik'=>16,
        'contact'=>17,
        'industry_about'=>18,
        'priorities'=>19,
        'plan'=>20,
        'infrastructure'=>21,
        'logistic'=>22,
        'selected_products'=>23,
        'rezidents'=>24,
        'plan_image'=>25,
        'leaderships'=>26,
    ];

    protected $with = [
        'seo', 'fields'
    ];

    protected $casts = [
        'slug' => LocalizedObject::class
    ];

    //todo: add global scope: published

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'post_field')
            ->using(PostField::class)
            ->withPivot([
                'value', 'field_value_id', 'id'
            ]);
    }

    public static function isShownOnPageOnly(int $type): bool
    {
        return in_array($type, [
            self::TYPES['slider'],
            self::TYPES['details'],
            self::TYPES['advantages'],
            self::TYPES['maps'],
            self::TYPES['qarabag'],
            self::TYPES['missions'],
            self::TYPES['leadership'],
            self::TYPES['reports'],
            self::TYPES['lows'],
            self::TYPES['grafik'],
            self::TYPES['contact'],
            self::TYPES['industry_about'],
            self::TYPES['priorities'],
            self::TYPES['plan'],
            self::TYPES['infrastructure'],
            self::TYPES['logistic'],
            self::TYPES['selected_products'],
            self::TYPES['rezidents'],
            self::TYPES['plan_image'],
        ]);
    }

    public function getField(Field|string $field): PostField|Collection|null
    {
        if ($field instanceof Field) {
            $_field = $this->fields->where('identifier', '=', $field->identifier);
        } else {
            $_field = $this->fields->where('identifier', '=', $field);
        }


        if ($_field->isNotEmpty()) {
            if ($_field->first()->hasMultipleValues()) {
                return $_field->pluck('pivot');
            } else {
                return $_field->first()->pivot;
            }
        }

        return null;
    }
}
