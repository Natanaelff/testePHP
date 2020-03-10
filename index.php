<?php
require_once 'conexao.php';
$c = new Cadastrar("teste","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>TESTE DESENVOLVIMENTO</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<h1>Formulário de Cadastro</h1>
	<?php 
		if(isset($_POST['nome']))
		{
			$nome = addslashes(($_POST['nome']));
			$email = addslashes(($_POST['email']));
			$telefone = addslashes(($_POST['telefone']));
			$dateNas = addslashes(($_POST['dateNas']));
			$endereco = addslashes(($_POST['endereco']));
			if (!empty($nome) && !empty($email)){
				if($c->cadastrarForm($nome, $email, $telefone, $dateNas, $endereco))
				{
					header("Location: cadastrado.php");
				}else{
					echo "Ja Cadastrado";
				}
			}else
			{
				echo "Prencher os campos obrigatórios";
			}
		}
	?>
	<form method="POST">
		<label>Nome</label>
		<input type="text" name="nome" placeholder="Nome Completo">

		<label>Email</label>
		<input type="email" name="email" placeholder="Email">

		<label>Telefone</label>
		<input type="text" name="telefone" placeholder="Telefone">

		<label>Data de Nascimento</label>
		<input type="date" name="dateNas" placeholder="Data de Nascimento">

		<label>Endereço</label>
		<input type="text" name="endereco" placeholder="Endereço">

		<input name="Send" type="submit" value="Cadastrar">
	</form>
	<a href="consulta.php"><button>CONSULTAR</button></a>
</body>
</html>