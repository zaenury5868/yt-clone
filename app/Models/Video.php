<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function getThumbnailAttribute() {
        if($this->thumbnail_image) {
            return '/videos/' . $this->uid . '/' . $this->thumbnail_image;
        } else {
            return '/videos/' . 'default.jpg';
        }
    }

    public function getUploadedDateAttribute() {
        $d = new Carbon($this->created_at);
        return $d->toFormattedDateString();
    }

    public function channel() {
        return $this->belongsTo(Channel::class);
    }

    /**
     * Get all of the comments for the Video
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes(): HasMany
    {
        return $this->hasMany(Dislike::class);
    }
}
