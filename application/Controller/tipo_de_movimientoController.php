<?php
namespace Mini\Controller;
use Mini\Model\tipo_de_movimiento;
class tipo_de_movimientoController
{
    private $tipoMov;
    function __construct(){
        $this->tipoMov = new tipo_de_movimiento();
    }
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/tipo_de_movimiento/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formTipoMov()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/tipo_de_movimiento/formTipoMov.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarTipoMov()
    {
       $tipoMov = $this->tipoMov->listarTipoMov();
       foreach($tipoMov as $value){
           $idTM = $value['Id_tipoMov'];
           $nomTM = $value['Nombre'];

           $datos[] = array(
               'ID'=> $value['Id_tipoMov'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarTipoMov
               ('.$idTM.','."'".$nomTM."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarTipoMov('.$idTM.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearTipoMov()
    {
        $this->tipoMov->set('Nombre',$_POST['nomTipoM']);  
        echo $this->tipoMov->crearTipoMov();  
    }

    public function editarTipoMov()
    {
        $this->tipoMov->set('Id_tipoMov',$_POST['identificador']);  
        $this->tipoMov->set('Nombre',$_POST['nomTipoM']);  
        echo $this->tipoMov->editarTipoMov();  
    }

    public function eliminarTipoMov()
    {
        $this->tipoMov->set('Id_tipoMov',$_POST['identificador']);  
        echo $this->tipoMov->eliminarTipoMov();  
    }
}