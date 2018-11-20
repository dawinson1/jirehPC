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


    public function crearCliente()
    {
    $this->cliente->set('id_cliente',$_POST['identificador']);
    $this->cliente->set('nombreCliente',$_POST['nomCliente']);
    $this->cliente->set('apellidoCliente',$_POST['apeCliente']);
    $this->cliente->set('correoCliente',$_POST['correoCliente']);
    $this->cliente->set('direccionCliente',$_POST['direcCliente']);
    $this->cliente->set('telefono',$_POST['telCliente']);
    $this->cliente->set('contrasena',password_hash($_POST["passCliente"],PASSWORD_BCRYPT));
    $this->cliente->set('Url_imgClient',$_POST['perfilClient']);
    echo $this->cliente->crearCliente();
    }

    public function editarCliente()
    {
        $this->cliente->set('id_cliente',$_POST['identificador']);
        $this->cliente->set('nombreCliente',$_POST['nomCliente']);
        $this->cliente->set('apellidoCliente',$_POST['apeCliente']);
        $this->cliente->set('correoCliente',$_POST['correoCliente']);
        $this->cliente->set('direccionCliente',$_POST['direcCliente']);
        $this->cliente->set('telefono',$_POST['telCliente']);
        $this->cliente->set('contrasena',password_hash($_POST["passCliente"],PASSWORD_BCRYPT));
        echo $this->cliente->editarCliente();
    }

    public function eliminarCliente()
    {
      $id = $_POST['identificador'];
      $carpeta = ('img/perfiles/'.$id);


    		foreach(glob($carpeta . "/*") as $archivos_carpeta)
    		{
    			if (is_dir($archivos_carpeta))
    			{
    				eliminarDir($archivos_carpeta);
    			}
    			else
    			{
    				unlink($archivos_carpeta);
    			}
    		}
    		rmdir($carpeta);


        $this->cliente->set('id_cliente',$_POST['identificador']);
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
}
