<?php
namespace Mini\Controller;
use Mini\Model\detalle_pedido;
class detalle_pedidoController
{
    private $detaPedido;
    function __construct(){
        $this->detaPedido = new detalle_pedido();
    }

    public function listPedido()
    {
       $listPedido = $this->detaPedido->listarPedidos();
       foreach($listPedido as $value){
           $idCli = $value['idCliente'];
           $entrega = $value['fechaEntrega'];
           $idPed = $value['id_pedido'];
           $idEmp = $value['id_empleado'];
           $idEstPed = $value['idEstado_pedido'];
           $nomEst = $value['nomEst'];
           $totalPedi = $value['total'];
           $nomCli = $value['nomCli'];
           $nomEmp = $value['nomEmplo'];

           $datos[] = array(
               'idCliente'=> $idCli,
               'dateEntrega'=> $entrega,
               'id_pedido'=> $idPed,
               'id_emplo'=> $idEmp,
               'nomEstPedi'=> $nomEst,
               'totalPedido'=> $totalPedi,
               'verPedi'=>['<button type="button" class="btn btn-primary" onclick="verPedido
               ('.$idPed.','."'".$idCli."'".','."'".$nomCli."'".','."'".$idEmp."'".','."'".$nomEmp."'".',
               '."'".$entrega."'".','."'".$nomEst."'".','."'".$totalPedi."'".',)">Ver Pedido</button>'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarPed
               ('.$idPed.')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarTipoEnt('.$idPed.')">Eliminar</button>']
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

    public function saveDetallePedido()
    {
      //$data = json_decode($_POST['productos']);
      //var_dump($data);
      //var_dump($_POST);
      $resultadoPed = $this->detaPedido->ultimoPedido();

      if ($resultadoPed != false) {
          $ultimo = $resultadoPed['idPedido'];

        foreach ($_POST['idProd'] as $key => $value) {

          $this->detaPedido->set('Producto_Referencia', $value);
          $this->detaPedido->set('Pedido_idPedido', $ultimo);
          $this->detaPedido->set('cantidad', $_POST['cantProd'][$key]);
          $this->detaPedido->set('valor_unit', $_POST['precUnit'][$key]);
          $this->detaPedido->set('valor_subTotal', $_POST['totPrec'][$key]);
          echo $this->detaPedido->saveDetails();;
        }

      } else {
        echo 'ErrorAlGuadarPedido';
      }

    }

    public function seeOrder()
    {
        $this->detaPedido->set('Pedido_idPedido',$_POST['idP']);
        $infoPed = $this->detaPedido->verPedidos();
        echo json_encode($infoPed);
    }

    public function seeOrder2()
    {
      $show = $this->pedido->verPedidos();
      echo json_encode($emplo);
    }
}
