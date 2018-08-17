<?php

namespace Mini\Controller;

use Mini\Model\login;

class loginController
{
    private $login;

    function __construct(){
        $this->login = new login(); 
    }

    public function index()
    {
        require APP . 'view/_templates/headerlogin.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/footerlogin.php';
    }

    public function inicioSesion()
    {
        $this->login->set('id_cliente',$_POST['identificador']);
        $this->login->set('contrasena',($_POST["passCliente"]));
        $pass= $_POST["passCliente"];
        return $pass;
        echo $this->login->buscarDatosLog();
    
        //return $datos->fetchAll();
    }
    
}