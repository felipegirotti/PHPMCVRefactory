<?php

/**
* Modelo base para os modelos da aplicação.
*
* @author TreinaWeb
* @access public
*/

namespace TreinaWeb;

class Model
{
    function __construct()
    {
        // Cria na propriedade 'db' o objeto da classe Database 
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }
}
