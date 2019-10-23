<?php
		
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	header('Content-Type: text/html; charset=utf-8');

	require 'Validacao.php';
	require 'ContaCorrente.php';

	$contaJoao = new ContaCorrente("Joao","0001","343477-9","2000.00");
	$contaMaria = new ContaCorrente("Maria","0001","343885-5","6000.00");

	
	echo "<h1>Contas Correntes</h1>";

	
	echo "<h2>Conta Corrente: Titular: ".$contaJoao->getTitular()."</h2>";
	echo "<h2>Saldo". $contaJoao->getSaldo()."</h2>";
	

	echo "<h3>Apos um saque de R$20 </h3>";
	$contaJoao->sacar(20);

	var_dump($contaJoao);

	echo "<h3>Apos um deposito de R$ 50 </h3>";
	$contaJoao->depositar(50);

	var_dump($contaJoao);

	echo "<h3>Apos uma transferencia R$30 </h3>";
	$contaJoao->transferir(30, $contaMaria);

	var_dump($contaJoao);
	var_dump($contaMaria);