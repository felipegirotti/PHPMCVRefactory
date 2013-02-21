<?php

/**
 * 'Bootstrap' da aplicação
 */

define('APPLICATION_PATH', realpath(dirname(__FILE__)) . '/../src');
define('SITE_PATH',realpath(dirname(__FILE__)).'/');
define('VIEW_PATH', APPLICATION_PATH . '/Application/View');

set_include_path(
        SITE_PATH . '../vendor' . PATH_SEPARATOR .
        APPLICATION_PATH . PATH_SEPARATOR .
        get_include_path()
        );

require_once 'TreinaWeb/Autoloader.php';
// Configurações da aplicação
require_once('../config/config.php'); 


// Executa o router que escolhe qual controlador acionar
try
{
    $loader = new TreinaWeb\Autoloader();
    $loader->register();
    // Executa o roteador
    TreinaWeb\Router::run(new TreinaWeb\Request());
}
catch(\Exception $e)
{
    // Alguma exceção foi lançada pelo roteador?
    new Application\Controller\Error($e->getMessage());
}
