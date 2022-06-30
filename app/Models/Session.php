<?php

namespace App\Models;

use App\Traits\HasUserAgent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperSession
 */
class Session extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUserAgent;

    protected $casts = [
        'expires_at' => 'date'
    ];

    protected $fillable = [
        'expires_at'
    ];

    public function sessionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getDeviceAttribute(): string
    {
        $this->parsePlatform();
        $this->parseBrowser();

        return "$this->browserName ($this->platform)";
    }
}
