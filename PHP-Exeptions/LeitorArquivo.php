<?php

class LeitorArquivo{

	private $arquivo;

	public function __construct($arquivo){

		$this->arquivo = $arquivo;
	}	

	public function abrirArquivo(){

		echo "Abrindo Arquivo <br/>";
	}

	public function lerArquivo(){

		echo "Lendo Arquivo <br/>";
	}

	public function escreverNoArquivo(){

		echo "Escrevendo no Arquivo <br/>";
	}
	
	public function fecharArquivo(){

		echo "Fechando Arquivo <br/>";
	}

}