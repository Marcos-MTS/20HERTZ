<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {

    protected $fillable = ['titulo', 'descricao', 'data_evento', 'hora_evento'];

    public function fotos() {
        return $this->hasMany(Foto::class);
    }

}
