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
}
