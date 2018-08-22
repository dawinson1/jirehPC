<?php
namespace Mini\Controller;
use Mini\Model\rol;
class rolController
{
    private $rol;
    function __construct2(){
        $this->rol = new rol();
    }

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/rol/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formRol()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/rol/formRol.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarRol()
    {
       $rol = $this->rol->listarRol();
       foreach($rol as $value){
           $ID = $value['idRol'];
           $nomRol = $value['nombre'];

           $datos[] = array(
               'ID'=> $value['idRol'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" id="editarRol" onclick="editarRol
               ('.$ID.','."'".$nomRol."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarEstado('.$ID.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearRol()
    {
        $this->rol->set('Nombre',$_POST['Nombre']);  
        echo $this->rol->crearRol();  
    }

    public function editarRol()
    {
        $this->estados->set('idRol',$_POST['identificador']);  
        $this->estados->set('Nombre',$_POST['nomRol']);  
        echo $this->estados->editarRol();  
    }

    public function eliminarRol()
    {
        $this->estados->set('idRol',$_POST['identificador']);  
        echo $this->estados->eliminarEstado();  
    }
}