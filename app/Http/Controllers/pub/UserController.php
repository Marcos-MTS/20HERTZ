<?php

namespace App\Http\Controllers\pub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CadastroPublicadorRequest;
use App\Models\User;
use App\Models\Estado;
use App\Models\Cidade;
use App\Guzzle\Estados;
use App\Guzzle\Cidades;

class UserController extends Controller {

    protected $estados;
    protected $cidades;

    public function __construct(Estados $estados, Cidades $cidades) {
        $this->estados = $estados;
        $this->cidades = $cidades;
    }

    public function index() {
      
       $user = auth()->user();
        return view('pub/perfil', compact('user'));
    }
    

    public function create() {
        return view('pub/cadastroPublicador');
    }
    
    
    

    public function selectRegiao() {

        $estados = $this->estados->get();
        $estados = collect($estados)->sortBy('nome')->toArray();
        // foreach ($estados as $estado){
        //     echo $estado->id .' - '. $estado->nome . '<br>';
        // }

        return view('pub/selectRegiao', compact('estados'));
    }

    public function listCidades($id) {

        $cidades = $this->cidades->porId($id);
        $cidades = collect($cidades)->sortBy('nome')->toArray();
        $html = ' <option selected value="">Selecione sua Cidade</option>';
        foreach ($cidades as $cidade) {
            $html .= "<option value='" . $cidade->id . "'>" . $cidade->nome . "</value>";
        }

        return $html;
    }

    public function store(CadastroPublicadorRequest $request) {
        $request['image'] = "0";
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        return redirect()->route('cadastro.publicador')->with('success', 'Cadastrado com sucesso!');
    }

   

    public function updatePublicador(Request $request, Estado $estadoM, Cidade $cidadeM) {

        $request->validate([
            'estado_cod' => 'required',
            'cidade_cod' => 'required',
        ]);

        $user = auth()->user();
        $data = $request->all();

        $estadoDados = $this->estados->get($data['estado_cod']);
        $cidadeDados = $this->cidades->get($data['cidade_cod']);

        $itensEstado = ['cod' => $estadoDados->id, 'nome' => $estadoDados->nome, 'sigla' => $estadoDados->sigla];
        $itensCidade = ['cod' => $cidadeDados->id, 'nome' => $cidadeDados->nome, 'estado_id'=> $data['estado_cod']];

        $estadoM->insertOrIgnore($itensEstado);
        $cidadeM->insertOrIgnore($itensCidade);

        $update = $user->update($data);
        if ($update) {
            return redirect()->route('home')->with('success', 'Sucesso ao Atualizar');
        } else {
            return redirect()->back()->with('error', 'Falha ao atulalizar...');
        }
    }

}
