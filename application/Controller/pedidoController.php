<?php
namespace Mini\Controller;
use Mini\Model\pedido;
class pedidoController
{
    private $pedido;
    function __construct(){
        $this->pedido = new pedido();
    }
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function formPedidos()
    {
        $listProdPed = $this->listProd();
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/formPedidos.php';
        require APP . 'view/_templates/footer.php';
    }

    public function eliminarCliente()
    {
      $this->cliente->set('id_cliente',$_POST['identificador']);
      $this->cliente->set('idEstado_pedido',$_POST['identificador']);
      echo $this->cliente->eliminarCliente();
    }

    //listarPedidos
    //función para listar los clientes en un select
    public function ListClients()
    {
      $clients = $this->pedido->listarClientes();
      echo json_encode($clients);
    }

    //función para listar los estados en un select
    public function ListEstados()
    {
      $estados = $this->pedido->listarEstadosPed();
      echo json_encode($estados);
    }

    //función para listar los empleados en un select
    public function ListEmployees()
    {
      $emplo = $this->pedido->listarEmpleados();
      echo json_encode($emplo);
    }

    //función para listar los productos en la tabla
    public function listProd()
    {
      $productosPed = $this->pedido->listarProductos();
      return $productosPed;
    }

    public function savePedido()
    {
      $this->pedido->set('idCliente',$_POST['idClient']);
      $this->pedido->set('fechaEntrega',$_POST['datepicker']);
      $this->pedido->set('id_empleado',$_POST['idEmployee']);
      $this->pedido->set('idEstado_pedido',$_POST['selectEstado']);
      $this->pedido->set('total',$_POST['totalPedido']);
      echo $this->pedido->crearPedido();
    }

    public function cambiarEstadoPed()
    {
      $this->pedido->set('idEstado_pedido',$_POST[('idEstPed')]);
      $this->pedido->set('id_pedido',$_POST[('idPedido')]); /*el de la izq es de la bd, izq viene por ajax*/
      echo $this->pedido->cambiarEstadoPed();
    }
}
