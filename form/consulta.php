<?php 

require_once 'conexao.php';
$c = new Cadastrar("teste","localhost","root","");

$dados = $c->dados();

$cdm = "SELECT * FROM cadastrar";


foreach ($dados as $value) {
	echo 'Nome:'.$value['nome'].'<br>';
	echo 'Email:'.$value['email'].'<br><br><br>';
}