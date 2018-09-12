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
        $pass= $_POST["passCliente"];
        echo $this->login->buscarDatosLog($pass);
        //return $datos->fetchAll();
    }

    public function singout(){

        unset($_SESSION['loggedin']);
        unset($_SESSION['username']);
        unset($_SESSION['start']);
        unset($_SESSION['expire']);
        $_SESSION = []; // COMENTAR LINEAS SI SE QUIERE HACER OTRO PROYECTO SESSION Y DESTROY
        session_destroy();

        $this->index();
    }
    
}