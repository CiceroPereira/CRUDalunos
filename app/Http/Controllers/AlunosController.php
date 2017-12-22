<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Aluno;
use App\Models\Responsavel;
use App\Http\Requests\AlunoRequest;

class AlunosController extends Controller
{

	public function formulario(){
		return view('insert');
	}

	public function listing(){
		$all = Aluno::all();
		return view('listar', compact('all'));
	}
    
	public function post(AlunoRequest $request){
   		
		 $aluno = new Aluno;
		 $responsavel = new Responsavel;
    	 $endereco = new Endereco;

    	 $endereco->cep = $request->cep;
    	 $endereco->rua = $request->rua;
    	 $endereco->numero = $request->numero;
    	 $endereco->bairro = $request->bairro;
    	 $endereco->cidade = $request->cidade;
    	 $endereco->estado = $request->estado;
    	 $endereco->save();

    	 $aluno->nome = $request->nome;
    	 $aluno->endereco_id = $endereco->id;
    	 $aluno->datanasc = $request->datanasc;
    	 $aluno->serie = $request->serie;
    	 $aluno->save();

    	 $responsavel->nomemae = $request->nomemae;
    	 $responsavel->aluno_id = $aluno->id;
    	 $responsavel->cpf = $request->cpf;
    	 $responsavel->datapag = $request->datapag;
    	 $responsavel->save();

    	 dd(Endereco::all());


    }




}
