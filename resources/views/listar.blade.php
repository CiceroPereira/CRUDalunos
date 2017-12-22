<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<ul class="nav nav-tabs">
  		<li class="active">
    		<a href="{{url('/')}}">Home</a>
  		</li>
  		<li><a href="{{url('/insert')}}">Cadastrar</a></li>
  		<li><a href="{{url('/listar')}}">Listar</a></li>
	</ul>

	<div class="container">
		<h3 style="opacity: 0.6">Lista de alunos</h3>
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Data de nascimento</th>
						<th>Serie</th>
						<th>Cep</th>
						<th>Rua</th>
						<th>Numero</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Nome da mãe</th>
						<th>Cpf(mãe)</th>
						<th>Data de pagamento</th>
					</tr>
				</thead>
				<tbody>
				@foreach($all as $aluno )
					<tr>
						<td>{{$aluno->nome}}</td>
						<td>{{$aluno->datanasc}}</td>
						<td>{{$aluno->serie}}</td>
						<td>{{$aluno->endereco->cep}}</td>
						<td>{{$aluno->endereco->rua}}</td>
						<td>{{$aluno->endereco->numero}}</td>
						<td>{{$aluno->endereco->bairro}}</td>
						<td>{{$aluno->endereco->cidade}}</td>
						<td>{{$aluno->endereco->estado}}</td>
						<td>{{$aluno->responsavel->nomemae}}</td>
						<td>{{$aluno->responsavel->cpf}}</td>
						<td>{{$aluno->responsavel->datapag}}</td>
						<td><a href="{{url('insert/edit', $aluno->id)}}" class="btn btn-success">Editar</a>
						<td>
							<form method="post" action="{{url('listar/delete', $aluno->id)}}">
								{!! csrf_field() !!}
								{{method_field('DELETE')}}
								<input type="hidden" name="method" value="DELETE">
								<input type="submit" value="Excluir" class="btn btn-danger">  

							</form>

						</td>
					</tr>
				@endforeach	
				</tbody>
			</table>
			

		</div>
	</div>


</body>
</html>