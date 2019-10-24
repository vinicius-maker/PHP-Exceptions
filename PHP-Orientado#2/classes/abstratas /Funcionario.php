<?php

namespace classes\abstratas;

abstract class Funcionario{

    public $nome;
    public $cpf;
    protected $salario;
    protected static $piso = 980.00;

    abstract public function getBonificacao();

    final public function aumentarSalario(){
        
        $this->salario *= 1.3;
    }

    public static function setPiso($valor){

        self::$piso = $valor;
    }
    
    public function __construct($cpf, $salario)
    {
        if(func_num_args() ==2){
            $this->cpf = $cpf;
            $this->salario = $salario;
        } else{
            $this->construtor2($cpf);
        }
    }

    public function construtor2($cpf)
    {
        $this->cpf = $cpf;
        $this->salario = self:: $piso;
    }

  

	

    

}