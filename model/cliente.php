<?php

	class cliente {

		private $id = 0;
		private $nome = "";
		private $cpf = "";
		private $endereco = "";
		private $cidade = "";
		private $telefone = "";

		function getId(){
			return $this->id;
		}

		function setId($id){
			$this->id = $id;
		}

		function getNome(){
			return $this->nome;
		}

		function setNome($nome){
			$this->nome = $nome;
		}

		function getCpf(){
			return $this->cpf;
		}

		function setCpf($cpf){
			$this->cpf = $cpf;
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

		function getTelefone(){
			return $this->telefone;
		}

		function setTelefone($telefone){
			$this->telefone = $telefone;
		}
	}