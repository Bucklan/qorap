<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;


/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,
        SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
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


//      The Collection component will show a preview thumbnail for items in the collection it is showing.
//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this
//            ->addMediaConversion('preview')
//            ->fit(Manipulations::FIT_CROP, 300, 300)
//            ->nonQueued();
//    }

//    public function gifts()
//    {
//        return $this->hasMany(Gift::class);
//    }
//    public function gender(){
//        return $this->belongsTo(Gender::class);
//    }
//
//    public function giftsRated()
//    {
//        return $this->belongsToMany(Gift::class, 'rating')
//            ->withPivot('rating')
//            ->withTimestamps();
//    }

//    public function giftsLike()
//    {
//        return $this->belongsToMany(Gift::class, 'like')
//            ->withPivot('like')
//            ->withTimestamps();
//    }
//
//    public function comments()
//    {
//        return $this->hasMany(Comment::class);
//    }

//    public function giftsBought(){
//        return $this->belongsToMany(Gift::class,'cart')
//            ->withTimestamps()
//            ->withPivot('number','status');
//    }
//    public function giftsWithStatus($status){
//        return $this->belongsToMany(Gift::class,'cart')
//            ->wherePivot('status',$status)
//            ->withTimestamps()
//            ->withPivot('number','status');
//    }
}
