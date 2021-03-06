<?php

	$acao = 'recuperarPendente';
	require 'tarefa_controller.php';
	
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script type="text/javascript">
			function editar(id,txt_Tarefa){
				//criando um form de edição
				let form = document.createElement('form')
				form.action = 'index.php?pag=index&acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criando um input para entrada do texto
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'col-9 form-control'
				inputTarefa.value = txt_Tarefa
				//input hidden para guardar o id_tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id
				//criar um button para enviar
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'btn btn-info cal-3'
				button.innerHTML = 'Atualizar'
				//arvore de elementos
				form.appendChild(inputTarefa)
				form.appendChild(button)
				form.appendChild(inputId)
				//selecionando a tarefa
				let tarefa = document.getElementById('tarefa_'+id)
				//limpar o texto na tarefa
				tarefa.innerHTML = ''
				//incluir form
				tarefa.insertBefore(form, tarefa[0])
			}

			function remover(id){
				location.href = 'index.php?pag=index&acao=remover&id=' + id
			}

			function marcarRealizada(id){
				location.href = 'index.php?pag=index&acao=marcarRealizada&id=' + id
			}
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />
								<?php foreach ($tarefas as $tarefa) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div id="tarefa_<?=$tarefa['id']?>" class="col-sm-9">
											<?=$tarefa['tarefa']?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i onclick="remover(<?=$tarefa['id']?>)" class="fas fa-trash-alt fa-lg text-danger"></i>
											<i onclick="editar(<?=$tarefa['id']?>,'<?=$tarefa['tarefa']?>')" class="fas fa-edit fa-lg text-info"></i>
											<i onclick="marcarRealizada(<?=$tarefa['id']?>)" class="fas fa-check-square fa-lg text-success"></i>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>