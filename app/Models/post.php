<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{

    use HasFactory,SoftDeletes;
    protected $table = "posts";
    public function comments(){
        return $this->hasMany(comment::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
      }

    public function votedUsers(){ //or simply likes
        return $this->belongsToMany(User::class, 'likes')->withPivot('is_dislike')->withTimestamps();
    }
    public function like_post(){
        return $this->hasMany(likes::class,'post_id')->where('deleted_at',null);
    }
}
