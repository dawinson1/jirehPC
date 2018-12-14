<?php
namespace Mini\Controller;
use Mini\Model\detalle_salida;
class detalle_salidaController
{
    private $detaSali;
    function __construct(){
        $this->detaSali = new detalle_salida();
    }

    public function listSalida()
    {
       $listEnt = $this->detaSali->listarSalidas();
       foreach($listEnt as $value){
           $dateSali = $value['fechaSalida'];
           $idSali = $value['idsalida'];
           $idEmp = $value['id_empleado'];
           $nomSali = $value['nomSali'];
           $nomEmp = $value['nomEmplo'];

           $datos[] = array(
               'dateSali'=> $dateSali,
               'id_Salida'=> $idSali,
               'id_emplo'=> $idEmp,
               'nomSali'=> $nomSali,
               'verSali'=>['<button type="button" class="btn btn-primary" onclick="verSalida
               ('.$idSali.','."'".$idEmp."'".','."'".$nomEmp."'".',
               '."'".$dateSali."'".','."'".$nomSali."'".')"><i class="fa fa-file-text-o"></i></button>']
           );
       }
       echo json_encode($datos);
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

    public function seeOrder()
    {
        $this->detaSali->set('Pedido_idPedido',$_POST['idP']);
        $infoPed = $this->detaSali->verSalidas();
        echo json_encode($infoPed);
    }

}
