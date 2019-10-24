<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CadastroEventoRequest;
use Carbon\Carbon;
use App\Models\Evento;
use Illuminate\Support\Str;

class EventoController extends Controller {

    public function create() {
        return view('event/cadastroEvento');
    }

    public function cadastrar(CadastroEventoRequest $request) {


        $foto_data = ['foto' => ''];
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $name = Str::random(20);
            $extenstion = $request->image->extension();
            $nameFile = "{$name}.{$extenstion}";

            $upload = $request->image->storeAs('fotos', $nameFile);

            if (!$upload) {
                return redirect()->back()->with('error', 'Falha ao fazer o upload da imagem');
            } else {
                $foto_data['nome'] = $nameFile;
            }
        }

        $evento = auth()->user()->eventos();
        $respostaEvento = $evento->create($request->all());

        if ($respostaEvento) {
            if ($foto_data['nome']) {
                if (!$respostaEvento->fotos()->create($foto_data)) {
                    return redirect()->back()->with('error', 'Ocorreu algum erro ao registrar a foto!');
                }
            }
            return redirect()->route('listar.eventos')->with('success', 'Cadastro efetuado com Sucesso!');
        } else {
            return redirect()->back()->with('error', 'Ocorreu algum erro!');
        }
    }

    public function listar() {

        $user = auth()->user();

        $eventos = $user->eventos;
        return view('home', compact('eventos'));
    }
    
     public function visualizar($id) {
        $eventoD = Evento::find($id);
        return view('event/visualizarEvento', compact('eventoD'));
    }

    public function editar($id) {
        $eventoD = Evento::find($id);
        return view('event/edicaoEvento', compact('eventoD'));
    }

    public function salvar(CadastroEventoRequest $request, $id) {
        //  $request['data_evento'] = Carbon::parse($request['data_evento'])->format('d/m/Y');
        $resposta = Evento::find($id)->update($request->all());
        if ($resposta) {
            return redirect()->route('listar.eventos')->with('success', 'Salvo com Sucesso!');
        } else {
            return redirect()->back()->with('error', 'Ocorreu algum erro!');
        }
    }

    public function excluir($id) {
        $resposta = Evento::find($id)->delete();
        if ($resposta) {
            return redirect()->route('listar.eventos')->with('success', 'Excluido com Sucesso!');
        } else {
            return redirect()->back()->with('error', 'Ocorreu algum erro!');
        }
    }

}
