<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_person extends Model
{
    protected $table = "image_person";
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(image_person::class,'email','email_user');
    }

}
