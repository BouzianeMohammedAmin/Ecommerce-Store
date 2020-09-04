<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "admins";
    protected $guarded = []; //all attr is  fillable 

    /* protected $fillable = [
        'id',    'name',    'email', 'password'
    ];*/

    public $timestamps = true;
}