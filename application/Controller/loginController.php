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

    public function recuPass()
    {
        require APP . 'view/_templates/headerlogin.php';
        require APP . 'view/login/recuPass.php';
        require APP . 'view/_templates/footerlogin.php';
    }

    public function restaurar()
    {
        require APP . 'view/_templates/headerRecu.php';
        require APP . 'view/login/restaurar.php';
        require APP . 'view/_templates/footerlogin.php';
    }

    public function validarEmail()
    {
      $this->login->set('correoCliente',$_POST['EmailForPass']);
      $this->login->set('correo',$_POST['EmailForPass']);
      $Correo= $_POST["EmailForPass"];
      echo $this->login->buscarCorreo($Correo);
    }


    public function inicioSesion()
    {
        $this->login->set('id_cliente',$_POST['identificador']);
        $this->login->set('idEmpleado',$_POST['identificador']);
        $pass= $_POST["pass"];
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

    public function BuscarUser()
    {
        $this->login->set('Token',$_POST[('tokenUser')]); /*el de la izq es de la bd, izq viene por ajax*/
        $emailUser = $_POST["EmailUser"];
        echo $this->login->BuscarUser($emailUser);
    }

    public function restorePass()
    {
      $this->login->set('Token',$_POST[('tokenUser')]);
      $newPass = password_hash($_POST["newPass"],PASSWORD_BCRYPT);
      echo $this->login->restorePass($newPass);
    }
}
