<?php

	class brinquedo {
		private $idBrinquedo = 0;
		private $nomeBrinquedo = "";
		private $valorBrinquedo = 0;
		private $quantidade = 0;

		function setIdBrinquedo($idBrinquedo){
			$this->idBrinquedo = $idBrinquedo;
		}

		function getIdBrinquedo(){
			return $this->idBrinquedo;
		}

		function setNomeBrinquedo($nomeBrinquedo){
			$this->nomeBrinquedo = $nomeBrinquedo;
		}

		function getNomeBrinquedo(){
			return $this->nomeBrinquedo;
		}

		function setValorBrinquedo($valorBrinquedo){
			$this->valorBrinquedo = $valorBrinquedo;
		}

		function getValorBrinquedo(){
			return $this->valorBrinquedo;
		}

		function setQuantidade($quantidade){
			$this->quantidade = $quantidade;
		}

		function getQuantidade(){
			return $this->quantidade;
		}
	}

?>