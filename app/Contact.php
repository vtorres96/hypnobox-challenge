<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";
    protected $primaryKey = "id";
    protected $fillable = [
        "first_name", "last_name", "phone_number", "email", "date_of_birth", "avatar"
    ];
}
