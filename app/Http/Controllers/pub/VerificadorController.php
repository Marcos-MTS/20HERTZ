<?php

namespace App\Http\Controllers\pub;

use App\Http\Controllers\Controller;


class VerificadorController extends Controller {

    public function index() {
        $user = auth()->user();
        if ($user->cidade_cod && $user->estado_cod) {
            return redirect()->route('listar.eventos');
        }else{
            return redirect()->route('regiao.publicador');
        }
    }

}
