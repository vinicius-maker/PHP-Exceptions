<?php

use exception\SaldoInsuficienteException;

class ContaCorrente{

	private $titular;
	public  $agencia;
	private $conta;
	private $saldo;
	public static $totalDeContas;
	public static $taxaOperacao;
	public $totalSaquesNaoPermitidos;
	public static $operacaoNaoRealizada;

	public function __construct($titular, $agencia, $conta, $saldo){

			$this->titular = $titular;
			$this->agencia = $agencia;
			$this->conta = $conta;
			$this->saldo = $saldo;
			
			self::$totalDeContas ++;

			try{
				if(self::$totalDeContas <1 ){
					throw new Exception("Numero menor que Zero!");
					
				}
				self::$taxaOperacao = (30/self::$totalDeContas);
				
			}catch(Exception $erro){
				echo $erro->getMessage();
				exit;

			}

			
			
	}	

	public function sacar($valor){

		Validacao::validaNumerico($valor);
		//Validacao::verificaValorNegativo($valor);
		if ($valor < 0){
			throw new Exception("O numero passado é negativo");
		}
				
		if($valor > $this->saldo){

			throw new SaldoInsuficienteException("Saldo Insuficiente",$valor,$this->saldo);
			
		}
		$this->saldo = $this->saldo - $valor;
		
		return $this;
	} 

	public function depositar($valor){

		Validacao::validaNumerico($valor);
		
		$this->saldo = $this->saldo + $valor;
		
		return $this;
	}

	public function transferir($valor, ContaCorrente $contaCorrente){

		try{
				
			$arquivo = new LeitorArquivo("logTransferencia.txt");

			$arquivo->abrirArquivo();
			$arquivo->escreverNoArquivo();

			Validacao::validaNumerico($valor);
		
			//Validacao::verificaValorNegativo($valor);
			if ($valor < 0){
			throw new Exception("O numero passado é negativo");
			}
		
			$this->sacar($valor);
		
			$contaCorrente->depositar($valor);

			$arquivo->fecharArquivo();
		
			return $this;

		}catch(\Exception $e){

			ContaCorrente::$operacaoNaoRealizada ++;
			throw new exception\OperacaoNaoRealizadaException("Operaçao nao Realizada", 55, $e);
			
		}finally{
			$arquivo->fecharArquivo();

		}
	
		
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


