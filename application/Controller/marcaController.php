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

           $datos[] = array(
               'ID'=> $value['idmarca'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarMarca
               ('.$idMar.','."'".$nomMar."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarMarca('.$idMar.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearMarca()
    {
        $this->marca->set('Nombre',$_POST['nomMarca']);
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


    public function cambiarEstado(){
        
    }
}
