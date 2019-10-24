<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    public function cidade() {
        return $this->hasOne(Models\Cidade::class, 'cod', 'cidade_cod');
    }

    public function estado() {
        return $this->hasOne(Models\Estado::class, 'cod', 'estado_cod');
    }
    
    public function eventos() {
        return $this->hasMany(Models\Evento::class)->orderBy('id','DESC');;

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'estado_cod', 'cidade_cod'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
