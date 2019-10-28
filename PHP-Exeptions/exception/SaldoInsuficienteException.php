<?php

namespace exception;

class SaldoInsuficienteException extends \Exception{

		private $valor;
		private $saldo;

		public function __construct($mensagem, $valor,$saldo){

		parent::__construct($mensagem,null,null);

	}

		public function __get($param){

		return $this->$param;

	}




}