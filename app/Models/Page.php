<?php

namespace App\Models;

use App\Casts\LocalizedObject;
use App\Traits\HasField;
use App\Traits\HasSearchEngineField;
use App\Traits\HasVisits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @mixin IdeHelperPage
 */
class Page extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSearchEngineField;
    use HasVisits;

    public const TYPES = [
        'main' => 1,
        'content' => 2,
        'news'=>3,
        "redirect"=>4,
        "advertisements"=>5,
        "multimedia"=>6,
        "fag"=>7,
        "about"=>8,
        "leadership"=>9,
        "struktur"=>10,
        "reports"=>11,
        "centre"=>12,
        "lows"=>13,
        "grafik"=>14,
        "contact"=>15,
        "suggestion"=>16,
        "park"=>17,
        "industry"=>18,
        "agro_park"=>19,
        "rezident"=>20,
        "leaderships"=>21,
    ];


//    public function getNameAttribute(){
//        $locale=app()->getLocale();
//        return $this->name->$locale;
//    }

    protected $casts = [
        'name' => LocalizedObject::class,
        'slug' => LocalizedObject::class,
        'published' => 'boolean',
        'shown_in_menu' => 'boolean'
    ];

    protected $with = [
        'seo', 'sub_pages','parent', 'posts', 'fields'
    ];

    public $preventsLazyLoading = true;


    protected static function booted()
    {
        self::addGlobalScope('published', function (Builder $builder) {
            return $builder->wherePublished(true);
        });
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'page_field')
            ->using(PageField::class)->withPivot([
                'value', 'field_value_id', 'id'
            ]);
    }

    public function sub_pages(): HasMany
    {
        return $this->hasMany(self::class);
    }

    public function all_sub_pages(): HasMany
    {
        return $this->hasMany(self::class)->withoutGlobalScope('published');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'page_id')
            ->without(['sub_pages', 'seo'])
            ->withoutGlobalScope('published');
    }

    public function makeSlug(string $locale, bool $reverse = true): array
    {
        $parts = [];

        if ($this->page_id) {
            $parts[] = localized($this->slug, $locale);

            $parts = array_merge($parts, $this->parent?->makeSlug($locale, false) ?? []);
        }

        return $reverse ? array_reverse($parts) : $parts;
    }



    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->orderBy('created_at');
    }




    public function getField(Field $field): PageField|Collection|null
    {
        $_field = $this->fields->where('identifier', '=', $field->identifier);

        if ($_field->isNotEmpty()) {
            if ($field->hasMultipleValues()) {
                return $_field->pluck('pivot');
            } else {
                return $_field->first()->pivot;
            }
        }

        return null;
    }








}
