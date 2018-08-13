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


        echo $this->login->inicioSesion(); 
        //return $datos->fetchAll();
    }

    public function logeo()
    {
        session_start();
        $login = $this->login->inicioSesion();
        foreach ($login as $dato) {
            $password = $dato['contrasena'];
            if ($dato->rowCount()>0) {
                //$query->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password,$dato['contrasena'])) {
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$dato["nombreCliente"];
                    $_SESSION['start']=time();
                    $_SESSION['expire']=$_SESSION['start']+(5*60);
        
                    echo '<script>
                            var Url = "<?=URL?>";
                            //window.location="<?php echo URL; ?>cliente";                
                            swal("Bienvenido $_SESSION[username] !", "Has iniciado sesion!", "success");
                          </script>';
                }else {
                    
                    echo '<script>            
                            swal("Upss", "Nombre de usuario o contraseña son incorrectas!", "error");
                          </script>';
                }
            }
        }
    }

    
}