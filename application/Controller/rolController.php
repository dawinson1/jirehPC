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
           $idRol = $value['idRol'];
           $nomRol = $value['Nombre'];

           $datos[] = array(
               'idRol'=> $value['idRol'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" id="editarRol" onclick="editarRol
               ('.$idRol.','."'".$nomRol."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarEstado('.$idRol.')">Eliminar</button>']
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
        $this->rol->set('idRol',$_POST['idRol']);  
        $this->rol->set('Nombre',$_POST['nomRol']);  
        echo $this->rol->editarRol();  
    }

    public function eliminarRol()
    {
        $this->rol->set('idRol',$_POST['idRol']);  
        echo $this->rol->eliminarEstado();  
    }
}