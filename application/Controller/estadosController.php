<?php
namespace Mini\Controller;
use Mini\Model\estados;
class estadosController
{
    private $estados;
    function __construct(){
        $this->estados = new estados();
    }
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/estados/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formEstado()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/estados/formEstado.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarEstado()
    {
       $estados = $this->estados->listarEstados();
       foreach($estados as $value){
           $idE = $value['id_estado'];
           $nomE = $value['nombre'];

           $datos[] = array(
               'ID'=> $value['id_estado'],
               'Nombre'=>$value['nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarEstado
               ('.$idE.','."'".$nomE."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarEstado('.$idE.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearEstado()
    {
        $this->estados->set('nombre',$_POST['nomEstado']);  
        echo $this->estados->crearEstado();  
    }

    public function editarEstado()
    {
        $this->estados->set('id_estado',$_POST['identificador']);  
        $this->estados->set('nombre',$_POST['nomEstado']);  
        echo $this->estados->editarEstado();  
    }

    public function eliminarEstado()
    {
        $this->estados->set('id_estado',$_POST['identificador']);  
        echo $this->estados->eliminarEstado();  
    }
}