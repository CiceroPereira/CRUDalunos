<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	@if(count($errors) > 0)
	<ul>
		@foreach($errors->all() as $value)
		<li>{{$value}} </li>

		@endforeach
	</ul>
	@endif
	<div class="container">
		<h3 style="opacity: 0.6">Dados do Aluno</h3>
	</div>
	<div class="container" style="background-color: #f7f7f7; padding-top: 15px; padding-bottom: 15px">
		
		<form method="POST" action="{{url('/insert')}}">
			{!! csrf_field() !!}
			<div class="row">
				<div class="form-group col-xs-12 col-md-6">
					<label>Nome</label>
					<input name="nome" type="text" class="form-control" value="{{old('nome')}}">	
				</div>
				<div class="form-group col-xs-12 col-md-3">
					<label>Data de nascimento</label>
					<input type="date" name="datanasc" value="{{old('datanasc')}}" class="form-control">
				</div>
				<div class="form-group col-xs-12 col-md-3">
					<label>Serie de ingresso</label>
				<!--	<input type="text" name="serie" class="form-control" value="{{old('serie')}}"> -->
					<select class="selectpicker form-control" name="serie" value = "{{old('serie')}}">
 						 <option>1º</option>
 						 <option>2º</option>
 						 <option>3º</option>
 						 <option>4º</option>
 						 <option>5º</option>
 						 <option>6º</option>
 						 <option>7º</option>
 						 <option>8º</option>
 						 <option>9º</option>
					</select>

				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Cep</label>
					<input type="text" name="cep" class="form-control" value="{{old('cep')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Rua</label>
					<input type="text" name="rua" class="form-control" value="{{old('rua')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Numero</label>
					<input type="text" name="numero" class="form-control" value="{{old('numero')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Bairro</label>
					<input type="text" name="bairro" class="form-control" value="{{old('bairro')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Cidade</label>
					<input type="text" name="cidade" class="form-control" value="{{old('cidade')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Estado</label>
					<input type="text" name="estado" class="form-control" value="{{old('estado')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Nome da mãe</label>
					<input type="text" name="nomemae" class="form-control" value="{{old('nomemae')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>CPF(mãe)</label>
					<input type="text" name="cpf" class="form-control" value="{{old('cpf')}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Data de pagamento</label>
					<input type="date" name="datapag" class="form-control" value="{{old('datapag')}}">
				</div>
				<div class="form-group col-xs-12">
					<button class="btn btn-primary btn-block">Enviar</button>
				</div>

				</div>
		</form>
	</div>
</body>
</html>	