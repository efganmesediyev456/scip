<?php

namespace App\Models;

use App\Casts\Reversed;
use App\Traits\HasSession;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

/**
 * @mixin IdeHelperAdmin
 */
class Admin extends Model implements HasMedia, Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    use Authorizable;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasSession;
    use Notifiable;

    protected $casts = [
        'phone' => Reversed::class,
        'password_changed_at' => 'datetime',
        'tfa_secret' => 'encrypted',
        'sms_enabled' => 'boolean',
        'role' => 'encrypted'
    ];

    protected $hidden = [
        'password',
        'tfa_secret'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('picture')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->acceptsFile(fn (File $file) => $file->size <= 2 * 1024 * 1024)
            ->useFallbackUrl(asset('assets/admin/static/profile.svg'));
    }
}
