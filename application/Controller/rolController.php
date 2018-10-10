<?php
namespace Mini\Controller;
use Mini\Model\rol;
class rolController
{
    private $rol;
    function __construct(){
        $this->rol = new rol();
    }

    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/rol/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formRol()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/rol/formRol.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarRol()
    {
       $rol = $this->rol->listaRol(); // Esta función viene del modelo.
       foreach($rol as $value){
           $idR = $value['idRol'];
           $nomR = $value['Nombre'];

           $datos[] = array(
               'ID'=> $value['idRol'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarRol
               ('.$idR.','."'".$nomR."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarRol('.$idR.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearRol()
    {
        $this->rol->set('Nombre',$_POST['nomRol']);
        echo $this->rol->crearRol();
    }

    public function editarRol()
    {
        $this->rol->set('idRol',$_POST['identificador']);
        $this->rol->set('Nombre',$_POST['nomRol']);
        echo $this->rol->editarRol();
    }

    public function eliminarRol()
    {
        $this->rol->set('idRol',$_POST['identificador']);
        echo $this->rol->eliminarRol();
    }
}
