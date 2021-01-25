<?php
	session_start();
	include('conexao.php');
	if (empty($_POST['nome']) || empty($_POST['senha'])){
		header('Location: index.php');
		exit();
	}

	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$query = "select id,nome from tb_usuarios where nome = '{$nome}' and senha = '{$senha}'";
	$result = mysqli_query($conexao, $query); 
	$row = mysqli_num_rows($result);
	if ($row==1){
		$_SESSION['nome'] = $nome;
		header('Location: painel.php');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}


	
?>