<?php
	
function load ($namespace){

    
    $namespace = str_replace("\\", "/", $namespace);
   $caminhoAbsoluto = __DIR__ . "/". $namespace . ".php";

    return include $caminhoAbsoluto;
    
   
}

spl_autoload_register(__NAMESPACE__ . "\load");