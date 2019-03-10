<?php
namespace Mini\Controller;
use Mini\Model\marca;
class marcaController
{
    private $marca;
    function __construct(){
        $this->marca = new marca();
    }
    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/marca/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formMarca()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/marca/formMarca.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarMarca()
    {
       $marca = $this->marca->listarMarca();
       foreach($marca as $value){
           $idMar = $value['idmarca'];
           $nomMar = $value['Nombre'];
           $id_estado =$value['idEstado'];
           $nomEstadoMarca =$value['nombreEstadoMarc'];
           $id_estado =  $value['idEstado']==1?2:1;
           $check = $id_estado==1?"checked":"";

           $datos[] = array(
               'ID'=> $value['idmarca'],
               'Nombre'=>$value['Nombre'],
               'Estado'=>$value['nombreEstadoMarc'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarMarca
               ('.$idMar.','."'".$nomMar."'".')">Editar</button>'],
               'Eliminar'=>['<input type="checkbox" '.$check.' onchange="changeStatusMarca('."'".$id_estado."'".','."'".$idMar."'".')" id="toggleMarca_'.$idMar.'"
               class="toggle-Marca estMarc'.$id_estado.'" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Activar" data-off="Inactivar">']
           );
       }
       echo json_encode($datos);
    }

    public function crearMarca()
    {
        $this->marca->set('Nombre',$_POST['nomMarca']);
        $this->marca->set('idEstado',$_POST['estMarca']);
        echo $this->marca->crearMarca();
    }

    public function editarMarca()
    {
        $this->marca->set('idmarca',$_POST['identificador']);
        $this->marca->set('Nombre',$_POST['nomMarca']);
        echo $this->marca->editarMarca();
    }

    public function eliminarMarca()
    {
        $this->marca->set('idmarca',$_POST['identificador']);
        echo $this->marca->eliminarMarca();
    }


    public function cambiarEstadoMarca()
    {
      $this->marca->set('idEstado',$_POST[('idEstMarca')]);
      $this->marca->set('idmarca',$_POST[('idmarca')]); /*el de la izq es de la bd, izq viene por ajax*/
      echo $this->marca->cambiarEstadoMarca();
    }
}
