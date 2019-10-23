<?php

class ContaCorrente{

	private $titular;
	public $agencia;
	private $conta;
	private $saldo;

	public function __construct($titular, $agencia, $conta, $saldo){

			$this->titular = $titular;
			$this->agencia = $agencia;
			$this->conta = $conta;
			$this->saldo = $saldo;
	}	

	public function sacar($valor){

		Validacao::validaNumerico($valor);
		
		$this->saldo = $this->saldo - $valor;
		
		return $this;
	} 

	public function depositar($valor){

		Validacao::validaNumerico($valor);
		
		$this->saldo = $this->saldo + $valor;
		
		return $this;
	}

	public function transferir($valor, ContaCorrente $contaCorrente){

		Validacao::validaNumerico($valor);
		
		$this->sacar($valor);
		
		$contaCorrente->depositar($valor);
		
		return $this;
	}

	public function getTitular(){

		return $this->titular;
	}

	public function __get($atributos){
		
		Validacao::protegeAtributo($atributo);
		
		return $this->$atributo;
	}
	
	public function __set($atributo, $valor){
 		
 		Validacao::protegeAtributo($atributo);
		
		$this-> $atributo = $valor;
	}
		
	private function setNumero($numero){

		return $this->numero = $numero;
	}

	private function formataSaldo(){

		return "R$". number_format($this->saldo,2,",",".");
	}

	public function getSaldo(){

		return $this->formataSaldo();
	}

	public function __toString(){

		return "O titular da conta:". $this->titular. "O saldo atual: ".$this->getSaldo();
	}
}


