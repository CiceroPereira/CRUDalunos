<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

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
						<td><button class="btn btn-success">Editar</button></td>
						<td><button class="btn btn-danger">Excluir</button></td>
					</tr>
				@endforeach	
				</tbody>
			</table>
			

		</div>
	</div>


</body>
</html>