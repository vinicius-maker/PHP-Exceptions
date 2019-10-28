<?php
		
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	header('Content-Type: text/html; charset=utf-8');

	include "autoload.php";

	use Validacao;
	use ContaCorrente;


	$contaJoao = new ContaCorrente("Joao","0001","343477-9","2000.00");
	$contaMaria = new ContaCorrente("Maria","0001","343885-5","6000.00");
	$contaJose = new ContaCorrente("Jose","0001","143885-5","6000.00");
	$contaFernanda = new ContaCorrente("Fernanda","0001","243885-5","6000.00");
	$contaBernado = new ContaCorrente("Bernado","0001","358585-5","6000.00");
	$contaFelipe = new ContaCorrente("Felipe","0001","443885-5","6000.00");
	$contaLucas = new ContaCorrente("Lucas","0001","443885-5","6000.00");

	echo "<pre>";
	
	echo "Total de Contas:".ContaCorrente::$totalDeContas;

	echo "<br>";

	echo "Taxa:".ContaCorrente::$taxaOperacao;

	echo "<br>";






	echo "<h1>Contas Correntes</h1>";

	
	echo "<h2>Conta Corrente: Titular: ".$contaJoao->getTitular()."</h2>";
	var_dump($contaJoao);
	echo "<br>";
	

	try{
		$contaJoao->transferir(-10,$contaMaria);		
	
	}catch(\invalidoArgumentException $erro){
		echo $erro->getMessage();
		

	}catch(\exception\SaldoInsuficienteException $erro){
		echo $erro->getMessage(). "Saldo em conta". $erro->saldo."Valor do saque:".$erro->valor;
		
		$contaJoao->totalSaquesNaoPermitidos ++;
	}catch(\Exception $erro){
		
		echo $erro->getPrevious()->getTraceAsString();
		/*echo $erro->getPrevious()->getMessage();
		echo $erro->getMessage();
		echo "<br>";*/
	}

	echo "<br>";
	echo "Operaçao nao realizadas".ContaCorrente::$operacaoNaoRealizada;

	var_dump($contaJoao);
	echo "<br>";

	
	//echo "<h2>Saldo". $contaJoao->getSaldo()."</h2>";

	/*echo "<h3>Apos um saque de R$20 </h3>";
	$contaJoao->sacar(20);

	var_dump($contaJoao);

	echo "<h3>Apos um deposito de R$ 50 </h3>";
	$contaJoao->depositar(50);

	var_dump($contaJoao);

	echo "<h3>Apos uma transferencia R$30 </h3>";
	$contaJoao->transferir(30, $contaMaria);

	var_dump($contaJoao);
	var_dump($contaMaria);