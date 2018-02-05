<?php
	class evento{

		private $idEvento = "";
		private $data = "";
		private $endereco = "";
		private $cidade = "";
		private $cpfCliente = "";
		private $idCliente = 0;
		private $valorTotal = 0.0;
		private $desconto = 0.0;
		private $valorSinal = 0.0;

		//$cpfCliente não corresponde a uma coluna da tabela evento no db, pois o parâmetro é apenas utilizado como auxiliar 
		// para inserir a fk idCliente no db.

		function getIdEvento(){
			return $this->idEvento;
		}

		function getData(){
			return $this->data;
		}

		function setData($data){
			$this->data = $data;
		}

		function getEndereco(){
			return $this->endereco;
		}

		function setEndereco($endereco){
			$this->endereco = $endereco;
		}

		function getCidade(){
			return $this->cidade;
		}

		function setCidade($cidade){
			$this->cidade = $cidade;
		}

		function getCpfCliente(){
			return $this->cpfCliente;
		}

		function setCpfCliente($cpfCliente){
			$this->cpfCliente = $cpfCliente;
		}

		function getIdCliente(){
			return $this->idCliente;
		}

		function setIdCliente($idCliente){
			$this->idCliente = $idCliente;
		}

		function getValorTotal(){
			return $this->valorTotal;
		}

		function setValorTotal($valorTotal){
			$this->valorTotal = $valorTotal;
		}

		function getDesconto(){
			return $this->desconto;
		}

		function setDesconto($desconto){
			$this->desconto = $desconto;
		}

		function getValorSinal(){
			return $this->valorSinal;
		}

		function setValorSinal($valorSinal){
			$this->valorSinal = $valorSinal;
		}
	}
?>