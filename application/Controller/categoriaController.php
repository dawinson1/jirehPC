<?php
namespace Mini\Controller;
use Mini\Model\categoria;
class categoriaController
{
    private $categoria;
    function __construct(){
        $this->categoria = new categoria();
    }
    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/categoria/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formCategoria()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/categoria/formCategoria.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarCat()
    {
       $categoria = $this->categoria->listarCategoria();
       foreach($categoria as $value){
           $idCa = $value['id_categoria'];
           $nomCa = $value['Nombre'];
           $id_estado =$value['idEstado'];
           $nomEstadoCategoria =$value['nombreEstadoCat'];

           $datos[] = array(
               'ID'=> $value['id_categoria'],
               'Nombre'=>$value['Nombre'],
               'Estado'=>$value['nombreEstadoCat'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarCategoria
               ('.$idCa.','."'".$nomCa."'".')">Editar</button>'],
               'Eliminar'=>['<input type="checkbox" onchange="changeStatusCategoria('."'".$id_estado."'".','."'".$idCa."'".')" id="toggleCategoria_'.$idCa.'"
               class="toggle-Categoria estCat'.$id_estado.'" data-toggle="toggle" data-offstyle="danger" data-on="Activo" data-off="Inactivo">']
           );
           
       }
       echo json_encode($datos);
    }

    public function crearCategoria()
    {
        $this->categoria->set('Nombre',$_POST['nomCat']);
        $this->categoria->set('idEstado',$_POST['estCategoria']);
        echo $this->categoria->crearCategoria();
    }

    public function editarCategoria()
    {
        $this->categoria->set('id_categoria',$_POST['identificador']);
        $this->categoria->set('Nombre',$_POST['nomCat']);
        echo $this->categoria->editarCategoria();
    }

    public function eliminarCategoria()
    {
        $this->categoria->set('id_categoria',$_POST['identificador']);
        echo $this->categoria->eliminarCategoria();
    }

    public function cambiarEstadoCategoria()
    {
      $this->categoria->set('idEstado',$_POST[('idEstCat')]);
      $this->categoria->set('id_categoria',$_POST[('id_categoria')]); /*el de la izq es de la bd, izq viene por ajax*/
      echo $this->categoria->cambiarEstadoCategoria();
    }
}
