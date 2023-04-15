<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Video;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'photo',
        'email',
        'password',
        'username',
        'provider',
        'provider_id',
        'provider_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateUsername($username) {
        if($username === null) {
            $username = Str::lower(Str::random(8));
        }

        if(User::where('username', $username)->exists()) {
            $newUsername = $username.Str::lower(Str::random(3));
            $username = self::generateUsername($newUsername);
        }

        return $username;
    }

    /**
     * Get the user associated with the Channel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function channel(): HasOne
    {
        return $this->hasOne(Channel::class);
    }

    public function owns(Video $video) {
        return $this->id == $video->channel->user_id;
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
    
    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribedChannels(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class, 'subscriptions');
    }

    public function isSubscribedTo(Channel $channel) {
        return (bool) $this->subscriptions->where('channel_id', $channel->id)->count();
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
