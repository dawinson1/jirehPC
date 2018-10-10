<?php

namespace Mini\Controller;

use Mini\Model\estado_pedido;

class estado_pedidoController
{
    private $estado_pedido;
    function __construct(){
        $this->estado_pedido = new estado_pedido();
    }
    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/estado_pedido/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formEstadosPedidos()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/estado_pedido/formEstadosPedidos.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarEstadosPedidos()
    {
       $estado_pedido = $this->estado_pedido->listarEstadosPedidos();
       foreach($estado_pedido as $value){
           $idEP = $value['idEstadoPedido'];
           $nomEP = $value['Nombre'];

           $datos[] = array(
               'ID'=> $value['idEstadoPedido'],
               'Nombre'=>$value['Nombre'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarEstadoPedido
               ('.$idEP.','."'".$nomEP."'".')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarEstadoPedido('.$idEP.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearEstadoPedido()
    {
        $this->estado_pedido->set('Nombre',$_POST['nomEstPedido']);
        echo $this->estado_pedido->crearEstadoPedido();
    }

    public function editarEstadoPedido()
    {
        $this->estado_pedido->set('idEstadoPedido',$_POST['identificador']);
        $this->estado_pedido->set('Nombre',$_POST['nomEstPedido']);
        echo $this->estado_pedido->editarEstadoPedido();
    }

    public function eliminarEstadoPedido()
    {
        $this->estado_pedido->set('idEstadoPedido',$_POST['identificador']);
        echo $this->estado_pedido->eliminarEstadoPedido();
    }
}
