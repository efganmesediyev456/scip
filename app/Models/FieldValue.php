<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperFieldValue
 */
class FieldValue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'value' => 'object'
    ];

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class)->withTrashed();
    }
}
