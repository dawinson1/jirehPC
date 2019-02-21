<?php
namespace Mini\Controller;
use Mini\Model\editPerfil;
class editPerfilController
{
    private $prf;
    function __construct(){
        $this->prf = new editPerfil();
    }

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/editPerfil/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function srchd()
    {

      $rol = $_POST['serxrl'];

      if (($rol == 'Administrador') | ($rol == 'Técnico')) {

        $idemp = $_POST['serxid'];
        $dtsuser = $this->prf->srchdemp($idemp);
        echo json_encode($dtsuser);

      }else {

        $idcli = $_POST['serxid'];
        $dtsuser = $this->prf->srchdcli($idcli);
        echo json_encode($dtsuser);
      }


    }

}
