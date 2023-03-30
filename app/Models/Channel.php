<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    protected $guarded = [];
    use HasFactory;

    /**
     * Get the user that owns the Channel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPictureAttribute() {
        if($this->image) {
            return '/images/' . $this->image;
        } else {
            return '/images/' . 'default.jpg';
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get all of the comments for the Channel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function subscribers()
    {
        return $this->subscriptions->count();
    }

    /**
     * Get all of the comments for the Channel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
