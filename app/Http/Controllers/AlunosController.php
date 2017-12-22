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
		$aluno = new Aluno;
		$aluno->endereco = new Endereco;
		$aluno->responsavel = new Responsavel;
		return view('insert', compact('aluno'));
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

    	// dd(Endereco::all());
    	 return redirect('/listar');

    }

    public function destroy($id){

    	$aluno = Aluno::findOrFail($id);
    	$aluno->delete();

    	return back()->with(['success' => 'Aluno deletado com sucesso']);

    }

    public function edit($id){

    	$aluno = Aluno::findOrFail($id);
    	return view('insert', compact('aluno'));

    }

    public function update(AlunoRequest $request, $id){

    	

    	 $aluno = Aluno::findOrFail($id);
    	 $endereco = Endereco::findOrFail($aluno->endereco->id);
    	 $responsavel = $aluno->responsavel;

    	 $endereco->cep = $request->cep;
    	 $endereco->rua = $request->rua;
    	 $endereco->numero = $request->numero;
    	 $endereco->bairro = $request->bairro;
    	 $endereco->cidade = $request->cidade;
    	 $endereco->estado = $request->estado;
    	 $endereco->update();

    	 $aluno->nome = $request->nome;
    	 $aluno->datanasc = $request->datanasc;
    	 $aluno->serie = $request->serie;
    	 $aluno->update();

    	 $responsavel->nomemae = $request->nomemae;
    	 $responsavel->cpf = $request->cpf;
    	 $responsavel->datapag = $request->datapag;
    	 $responsavel->update();

    	 return redirect('/listar');


    }




}
