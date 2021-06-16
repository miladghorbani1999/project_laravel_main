<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follows extends Model
{

    use HasFactory;
    protected $table="follows";
    public function userFollower(){
        return $this->hasOne(user::class,'id','following_id');
      }
      public function userFollowing(){
        //   dd($this->where('accepted_at','!=','null')->get());
        return $this->hasOne(user::class,'id','follower_id');
      }

}
