<?php

require "../../app_lista_tarefas/tarefa.model.php";
require "../../app_lista_tarefas/tarefa.service.php";
require "../../app_lista_tarefas/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir' ){
	$tarefa = new Tarefa();
	$conexao = new Conexao();

	$tarefa->tarefa = $_POST['tarefa'];

	$tarefaservice = new TarefaService($conexao, $tarefa);
	$tarefaservice->inserir();
	header('Location: nova_tarefa.php?inclusao=1');	

} else if($acao == 'recuperar'){
	$tarefa = new Tarefa();
	$conexao = new Conexao();

	$tarefaservice = new TarefaService($conexao, $tarefa);
	$tarefas = $tarefaservice->recuperar();

} else if($acao == 'atualizar'){
	$tarefa = new Tarefa();
	$tarefa->id = $_POST['id'];
	$tarefa->tarefa = $_POST['tarefa'];

	$conexao = new Conexao();
	$tarefaservice = new TarefaService($conexao, $tarefa);
	if($tarefaservice->atualizar()){
		if($_GET['pag'] == 'index'){
			header('Location: index.php');
		}else{
			header('Location: todas_tarefas.php');
		}
	}

	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
} else if($acao == 'remover'){
	$tarefa = new Tarefa();
	$tarefa->id = $_GET['id'];

	$conexao = new Conexao();

	$tarefaservice = new TarefaService($conexao, $tarefa);
	$tarefaservice->remover();

	if($_GET['pag'] == 'index'){
		header('Location: index.php');
	}else{
		header('Location: todas_tarefas.php');
	}

} else if($acao == 'marcarRealizada'){
	$tarefa = new Tarefa();
	$tarefa->id = $_GET['id'];
	$tarefa->id_status = 2;

	$conexao = new Conexao();

	$tarefaservice = new TarefaService($conexao, $tarefa);
	$tarefaservice->marcarRealizada();
	
	if($_GET['pag'] == 'index'){
		header('Location: index.php');
	}else{
		header('Location: todas_tarefas.php');
	}
	
} else if($acao == 'recuperarPendente'){
	$tarefa = new Tarefa();
	$conexao = new Conexao();

	$tarefaservice = new TarefaService($conexao, $tarefa);
	$tarefas = $tarefaservice->recuperarPendente();

}