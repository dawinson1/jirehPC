<?php
namespace Mini\Controller;
use Mini\Model\tipo_de_entrada;
class tipo_de_entradaController
{
    private $tipoEnt;
    function __construct(){
        $this->tipoEnt = new tipo_de_entrada();
    }
    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/tipo_de_entrada/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formTipoEnt()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/tipo_de_entrada/formTipoEnt.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarTipoEnt()
    {
       $tipoEnt = $this->tipoEnt->listarTipoEnt();
       foreach($tipoEnt as $value){
           $idTE = $value['Id_tipoEnt'];
           $nomTE = $value['Nombre'];

           $datos[] = array(
               'ID'=> $value['Id_tipoEnt'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarTipoEnt
               ('.$idTE.','."'".$nomTE."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarTipoEnt('.$idTE.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearTipoEnt()
    {
        $this->tipoEnt->set('Nombre',$_POST['nomTipoE']);
        echo $this->tipoEnt->crearTipoEnt();
    }

    public function editarTipoEnt()
    {
        $this->tipoEnt->set('Id_tipoEnt',$_POST['identificador']);
        $this->tipoEnt->set('Nombre',$_POST['nomTipoE']);
        echo $this->tipoEnt->editarTipoEnt();
    }

    public function eliminarTipoEnt()
    {
        $this->tipoEnt->set('Id_tipoEnt',$_POST['identificador']);
        echo $this->tipoEnt->eliminarTipoEnt();
    }
}
