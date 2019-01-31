<?php
namespace Mini\Controller;
use Mini\Model\Mapa;
class MapaController
{
    private $Mapa;
    function __construct(){
        $this->Mapa = new Mapa();
    }
    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/Mapa/index.php';
        require APP . 'view/_templates/footer.php';
    }


}
