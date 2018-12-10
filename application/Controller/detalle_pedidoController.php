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
               '."'".$entrega."'".','."'".$nomEst."'".','."'".$totalPedi."'".',)"><i class="fa fa-file-text-o"></i></button>'],
               'Editar'=>['<input type="checkbox" onchange="changeStatusPed('."'".$idEstPed."'".','."'".$idPed."'".')" id="togglePed_'.$idPed.'"
               class="toggle-Pedido estPed'.$idEstPed.'" data-toggle="toggle" data-offstyle="danger" data-on="Pendiente" data-off="Finalizado">'],
               'Eliminar'=>['<button type="button" class="btn btn-danger btnCancel'.$idEstPed.'" onclick="cancelarPed('.$idPed.')">Cancelar</button>']
           );
       }
       echo json_encode($datos);
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

    public function pedCancel()
    {
      $this->detaPedido->set('idEstado_pedido',$_POST[('idEstPed')]);
      $this->detaPedido->set('id_pedido',$_POST[('idPedido')]);
      $updateEstPed = $this->detaPedido->cambiarEstadoPed();

      if ($updateEstPed) {
        $this->detaPedido->set('Pedido_idPedido',$_POST['idPedido']);
        $resultProdPed = $this->detaPedido->buscProdDetalle();

        if ($resultProdPed) {
          foreach ($resultProdPed as $value) {
            $referProd = $value['referencia'];
            $cantPedProd = $value['cantidad'];

            $cantPed[] = array('cantPed' => $cantPedProd );
            $refer[] = array('referPed' => $referProd );

            $resultcantAct = $this->detaPedido->buscarProducto($referProd);
            $cantDB = $resultcantAct['cantidad'];
            $cantActDB[] = array('cantDB' => $cantDB );
          }


          for ($i=0; $i < count($cantActDB); $i++) {
            $sumaCants[$i] = $cantActDB[$i]['cantDB'] + $cantPed[$i]['cantPed'];
          }

          foreach ($refer as $key => $value) {
            $idProd = $value['referPed'];
            $this->detaPedido->set('referencia', $idProd);
            $this->detaPedido->set('cantidad', $sumaCants[$key]);
            echo $this->detaPedido->updateCantProd();
          }
        }else {
          echo "PedNoEncontrado";
        }
      } else {
        echo "UpdateCancelError";
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
