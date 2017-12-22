<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('cep').value=("");
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
        //    document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
          //  document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
            //    document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>


</head>
<body>

	<ul class="nav nav-tabs">
  		<li class="active">
    		<a href="{{url('/')}}">Home</a>
  		</li>
  		<li><a href="{{url('/insert')}}">Cadastrar</a></li>
  		<li><a href="{{url('/listar')}}">Listar</a></li>
	</ul>

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
		
		@if(!isset($aluno->id))
		<form method="POST" action="{{url('/insert')}}">
		@else
		<form method= "post" action= "{{url('/insert/edit/'.$aluno->id)}}">
		{{method_field('PUT')}}
		
		@endif
			{!! csrf_field() !!}
			<div class="row">
				<div class="form-group col-xs-12 col-md-6">
					<label>Nome</label>
					<input name="nome" type="text" class="form-control" value="{{old('nome', $aluno->nome)}}">	
				</div>
				<div class="form-group col-xs-12 col-md-3">
					<label>Data de nascimento</label>
					<input type="date" name="datanasc" value="{{old('datanasc', $aluno->datanasc)}}" class="form-control" max="2999-12-31">
				</div>
				<div class="form-group col-xs-12 col-md-3">
					<label>Serie de ingresso</label>
				<!--	<input type="text" name="serie" class="form-control" value="{{old('serie')}}"> -->
					<select class="selectpicker form-control" name="serie" value = "{{old('serie', $aluno->serie)}}">
						 <option disabled selected value> -- escolha uma opção -- </option>
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
					<input type="text" id="cep" name="cep" class="form-control" value="{{old('cep', $aluno->endereco->cep)}}" onblur="pesquisacep(this.value);">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Rua</label>
					<input type="text" name="rua" class="form-control" value="{{old('rua', $aluno->endereco->rua)}}" id="rua">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Numero</label>
					<input type="text" name="numero" class="form-control" value="{{old('numero', $aluno->endereco->numero)}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Bairro</label>
					<input type="text" name="bairro" class="form-control" value="{{old('bairro', $aluno->endereco->bairro)}}" id="bairro">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Cidade</label>
					<input type="text" name="cidade" class="form-control" value="{{old('cidade', $aluno->endereco->cidade)}}" id="cidade">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Estado</label>
					<input type="text" name="estado" class="form-control" value="{{old('estado', $aluno->endereco->estado)}}" id="uf">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Nome da mãe</label>
					<input type="text" name="nomemae" class="form-control" value="{{old('nomemae', $aluno->responsavel->nomemae)}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>CPF(mãe)</label>
					<input type="text" name="cpf" class="form-control" value="{{old('cpf', $aluno->responsavel->cpf)}}">
				</div>
				<div class="form-group col-xs-12 col-md-4">
					<label>Data de pagamento</label>
					<input type="date" name="datapag" class="form-control" value="{{old('datapag' ,$aluno->responsavel->datapag)}}" max="2999-12-31">
				</div>
				<div class="form-group col-xs-12">
					<button class="btn btn-primary btn-block">Enviar</button>
				</div>

				</div>
		</form>
	</div>
</body>
</html>	