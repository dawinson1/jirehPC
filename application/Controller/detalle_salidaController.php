<?php
namespace Mini\Controller;
use Mini\Model\detalle_salida;
class detalle_salidaController
{
    private $detaSali;
    function __construct(){
        $this->detaSali = new detalle_salida();
    }

    public function listPedido()
    {
       $listPedido = $this->detaEnt->listarPedidos();
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
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarPed
               ('.$idPed.')">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-danger" onclick="eliminarTipoEnt('.$idPed.')">Cancelar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearTipoEnt()
    {
        $this->detaEnt->set('Nombre',$_POST['nomTipoE']);
        echo $this->detaEnt->crearTipoEnt();
    }

    public function editarTipoEnt()
    {
        $this->detaEnt->set('Id_tipoEnt',$_POST['identificador']);
        $this->detaEnt->set('Nombre',$_POST['nomTipoE']);
        echo $this->detaEnt->editarTipoEnt();
    }

    public function eliminarTipoEnt()
    {
        $this->detaEnt->set('Id_tipoEnt',$_POST['identificador']);
        echo $this->detaEnt->eliminarTipoEnt();
    }

    public function saveDetalleSalida()
    {
      $resultadoSali = $this->detaSali->ultimaSalida();
      $motivoSali = 'Producto vendido a un Cliente';

      if ($resultadoSali != false) {
          $ultimo = $resultadoSali['idSalida'];

        foreach ($_POST['idProd'] as $key => $value) {

          $this->detaSali->set('salida_idsalida', $ultimo);
          $this->detaSali->set('producto_referencia', $value);
          $this->detaSali->set('cantidad', $_POST['cantProd'][$key]);
          $this->detaSali->set('motivo', $motivoSali);
          echo $this->detaSali->saveDetailsSali();;
        }

      } else {
        echo 'ErrorAlGuadarEnt';
      }
    }

    public function saveDetalleEntrada2()
    {
      //$data = json_decode($_POST['productos']);
      //var_dump($data);
      //var_dump($_POST);
      $resultadoEnt = $this->detaEnt->ultimaEntrada();
      $motivoEnt = 'Producto comprado a un proveedor';

      if ($resultadoEnt != false) {
          $ultimo = $resultadoEnt['idEntrada'];

        foreach ($_POST['identificador2'] as $key => $value) {

          $this->detaEnt->set('entrada_identrada', $ultimo);
          $this->detaEnt->set('producto_referencia', $value);
          $this->detaEnt->set('cantidad', $_POST['cantPro2'][$key]);
          $this->detaEnt->set('motivo', $motivoEnt);
          echo $this->detaEnt->saveDetailsEnt();;
        }

      } else {
        echo 'ErrorAlGuadarEnt';
      }

    }

    public function seeOrder()
    {
        $this->detaEnt->set('Pedido_idPedido',$_POST['idP']);
        $infoPed = $this->detaEnt->verPedidos();
        echo json_encode($infoPed);
    }

    public function seeOrder2()
    {
      $show = $this->detaEnt->verPedidos();
      echo json_encode($emplo);
    }
}
