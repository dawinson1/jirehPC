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
        require APP . 'view/_templates/header.php';
        require APP . 'view/categoria/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formCategoria()
    {
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

           $datos[] = array(
               'ID'=> $value['id_categoria'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarCategoria
               ('.$idCa.','."'".$nomCa."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarCategoria('.$idCa.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearCategoria()
    {
        $this->categoria->set('Nombre',$_POST['nomCat']);  
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
}