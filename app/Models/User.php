<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "users";
    public function posts(){
        return $this->hasMany(post::class);
      }
      public function followers(){
        return $this->hasMany(follows::class,'follower_id')->where('deleted_at',null);
      }
      public function following(){
        return $this->hasMany(follows::class,'following_id')->where('deleted_at',null);
      }

      public function isFollowing(User $user)
    {
        return !! $this->following()->where('follower_id', $user->id)->count();
    }

    public function isFollowedBy(User $user)
    {
        return !! $this->followers()->where('following_id', $user->id)->count();
    }
    public function votedPosts(){
        return $this->belongsToMany(Post::class, 'likes')->withPivot('is_dislike')->withTimestamps();
    }
    public function image()
    {
        return $this->hasOne(image_person::class,'email_user','email');
    }
    public function like_user(){
        return $this->hasMany(likes::class,'user_id')->where('deleted_at',null);
    }
    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
