<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";
    protected $primaryKey = "id";
    protected $fillable = [
        "first_name", "last_name", "phone_number", "email", "avatar", "user_id"
    ];

    public function user(){
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function getAvatarImageAttribute($value) {
        return $this->avatar == null ? asset('img/null.png') : asset($this->avatar);
    }
}
