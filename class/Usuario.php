<?php
class Usuario {
	//Atributos
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	//Metodos Seters
	public function setUsuario($id){
		$this->idusuario = $id;
	}

	public function setDeslogin($deslogin){
		$this->deslogin = $deslogin;
	}

	public function setDessenha($dessenha){
		$this->dessenha = $dessenha;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	//Metodos Geters
	public function getIdusuario(){
		return $this->idusuario;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	//Carregar por ID
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario =:ID",array(":ID"=>$id));
		if (isset($results[0])){
			$row = $results[0];
			$this->setUsuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	//Lista Geral
	static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}

	//Procurar por %.*.%
	static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT deslogin, dessenha FROM tb_usuarios WHERE deslogin LIKE :LOGIN ORDER BY idusuario",array(":LOGIN"=>"%".$login."%"));
	}

	//Carregar por login
	public function login($login, $senha){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin =:LOGIN AND dessenha = :SENHA",array(":LOGIN"=>$login, ":SENHA"=>$senha));
		if (isset($results[0])){
			$row = $results[0];
			$this->setUsuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		} else {
			throw new Exception("Login e/ou senha inválidos.");
		}
	}

	//Metodo mágico toString
	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}
?>