<?php
namespace Mini\Controller;
use Mini\Model\detalle_entrada;
class detalle_entradaController
{
    private $detaEnt;
    function __construct(){
        $this->detaEnt = new detalle_entrada();
    }

    public function listEntrada()
    {
       $listEnt = $this->detaEnt->listarEntradas();
       foreach($listEnt as $value){
           $datent = $value['fechaEntrada'];
           $ident = $value['identrada'];
           $idEmp = $value['id_empleado'];
           $nomEnt = $value['nomEnt'];
           $nomEmp = $value['nomEmplo'];

           $datos[] = array(
               'dateEnt'=> $datent,
               'id_entrada'=> $ident,
               'id_emplo'=> $idEmp,
               'nomEnt'=> $nomEnt,
               'verEnt'=>['<button type="button" class="btn btn-primary" onclick="verEntrada
               ('.$ident.','."'".$idEmp."'".','."'".$nomEmp."'".',
               '."'".$datent."'".','."'".$nomEnt."'".')"><i class="fa fa-file-text-o"></i></button>']
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

    public function saveDetalleEntrada()
    {
      //$data = json_decode($_POST['productos']);
      //var_dump($data);
      //var_dump($_POST);
      $resultadoEnt = $this->detaEnt->ultimaEntrada();
      $motivoEnt = 'Producto comprado a un proveedor';

      if ($resultadoEnt != false) {
          $ultimo = $resultadoEnt['idEntrada'];

        foreach ($_POST['identificador'] as $key => $value) {

          $this->detaEnt->set('entrada_identrada', $ultimo);
          $this->detaEnt->set('producto_referencia', $value);
          $this->detaEnt->set('cantidad', $_POST['cantPro'][$key]);
          $this->detaEnt->set('motivo', $motivoEnt);
          echo $this->detaEnt->saveDetailsEnt();;
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
        $infoPed = $this->detaEnt->verEntradas();
        echo json_encode($infoPed);
    }
}
