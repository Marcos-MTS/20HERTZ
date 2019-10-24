<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable =['name', 'email', 'password', 'estado_cod', 'cidade_cod'];
}
