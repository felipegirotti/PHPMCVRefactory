<?php

/**
* Roteador. Responsável por incluir o controlador e executar o seu respectivo método informado
*
* @author TreinaWeb
* @access public
*/

namespace TreinaWeb;

use TreinaWeb\Request;

class Router
{
    /**
    * Método responsável por obter o nome do controlador e do método e executá-los.
    * @access public
    * @return void
    */
    
    public static function run(Request $request)
    {
        // Obtêm os segmentos da URL a partir do objeto $request
        $controlador = $request->getControlador();
        $metodo = $request->getMetodo();
        $args = (array)$request->getArgs();
        $controlador = 'Application\Controller\\' . ucfirst($controlador);
        $controlador = new $controlador();
        if (!is_callable(array($controlador, $metodo))) {
            self::error("Método - O metodo {$metodo} não foi encontrado");
            return;
        } 
        
        call_user_func_array(array($controlador, $metodo), $args);
        
    }
    
    // Error 
    
    protected static function error($msg)
    {
        throw new \Exception($msg);
    }
}
