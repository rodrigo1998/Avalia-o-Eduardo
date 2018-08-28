<?php

require_once 'Crud.php';

class Usuarios extends Crud{
	
	protected $table = 'clientes';
	private $nome;
	private $email;
	private $cpf;
	private	$endereco; 
	private	$complemento;
	private	$bairro; 
	private	$cidade;
	private	$estado;
	private	$cep;
	private	$telefone;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}

	public function getComplemento(){
		return $this->complemento;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function insert(){

		$sql  = "INSERT IGNORE INTO $this->table (nome, email, cpf, endereco, complemento, bairro, cidade, estado, cep, telefone) VALUES (:nome, :email, :cpf, :endereco, :complemento, :bairro, :cidade, :estado, :cep, :telefone)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':complemento', $this->complemento);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':estado', $this->estado);
		$stmt->bindParam(':cep', $this->cep);
		$stmt->bindParam(':telefone', $this->telefone);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE clientes SET nome = :nome, email = :email, cpf = :cpf, endereco = :endereco, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, telefone = :telefone WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':complemento', $this->complemento);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':estado', $this->estado);
		$stmt->bindParam(':cep', $this->cep);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		var_dump(DB::prepare($sql));
	}

}