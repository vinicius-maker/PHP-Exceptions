<?php

class Validacao{

	public static function protegeAtributo($atributo){

		if($atributo == 'titular' || $atributo == 'saldo'){
			throw new Execption ("O atributo $atributo continua privado");
		}
	}

	public static function validaNumerico($valor){

		if (!is_numeric($valor)){
			throw new invalidArgumentException("O numero passado é invalido");
			
		}
	
}
}