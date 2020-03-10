<?php

Class Cadastrar{

	private $pdo;

	public function __construct($dbname, $host, $user, $senha)
	{
		try
		{
		$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $senha);
		}
		catch (PDOException $e) {
			echo "Erro:".$e->getMessage();
			exit();
		}
		catch (Expection $e) {
			echo "Erro Falso:".$e->getMessage();
			exit();
		}
	}

	public function dados(){
		$res = array();
		$cmd = $this->pdo->query("SELECT * FROM cadastrar ORDER BY id");

		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);

		return $res;
	}

	public function cadastrarForm($nome, $email, $telefone, $dateNas, $endereco)
	{
		$cmd = $this->pdo->prepare("SELECT id from cadastrar WHERE email = :e");
		$cmd->bindValue(":e",$email);
		$cmd->execute();
		if($cmd->rowCount() > 0){
			return false;
		}else {
			$cmd = $this->pdo->prepare("INSERT INTO cadastrar (nome, email, telefone, dateNas, endereco) VALUES (:n, :e, :t, :d, :en)");

			$cmd->bindValue(":n", $nome);
			$cmd->bindValue(":e", $email);
			$cmd->bindValue(":t", $telefone);
			$cmd->bindValue(":d", $dateNas);
			$cmd->bindValue(":en", $endereco);
			$cmd->execute();

			return true;
		}
	}


}

?>