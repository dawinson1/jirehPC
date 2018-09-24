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
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/formPedidos.php';
        require APP . 'view/_templates/footer.php';
    }
    public function editCliente()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/editarProducto.php';
        require APP . 'view/_templates/footer.php';
    }
    public function listarCliente()
    {
       $pedido = $this->pedido->listarClientes();
       foreach($pedido as $value){
           $idC = $value['referencia'];
           $nomC = $value['id_categoria'];
           $apeC = $value['nombreProducto'];
           $CorrC = $value['cantidad'];
           $dicCl = $value['stock'];
           $telC = $value['precioUnit'];
           $contrC = $value['marca'];
           $imgC = $value['Url_imgProduct'];
           $datos[] = array(
               'Referencia'=> $value['id_cliente'],
               'Nombre'=>$value['nombreCliente'],
               'Apellido'=>$value['apellidoCliente'],
               'Correo'=>$value['correoCliente'],
               'Dirección'=>$value['direccionCliente'],
               'Telefono'=>$value['telefono'],
               'Editar'=>['<button type="button" class="btn btn-primary" id="editCliente" onclick="editarCliente
               ('.$idC.','."'".$nomC."'".','."'".$apeC."'".','."'".$CorrC."'".','."'".$dicCl."'".','."'".$telC."'".','."'".$contrC."'".',)">Editar</button>'],
               'Foto Perfil'=>$value['Url_imgClient'],
               'Actualizar Foto'=>['<button type="button" class="btn btn-primary" onclick="showModalImg('.$idC.')"><i class="fa fa-file-image-o"></i></button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarCliente('.$idC.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
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
    //listas productos
    public function ListProducts(){

      $pedido = $this->pedido->listarProductos();
      foreach($pedido as $value){
          $idProd = $value['referencia'];
          $nomProd = $value['nombreProducto'];
          $CantAct = $value['cantidad'];
          $PrecUnit = $value['precioUnit'];
          $datos[] = array(
              'Referencia'=> $value['referencia'],
              'Nombre'=>$value['nombreProducto'],
              'Cantidad'=>$value['cantidad'],
              'PrecioUnit'=>$value['precioUnit'],
              'Elegir'=>['<button type="button" class="btn btn-primary" id="editCliente" onclick="editarCliente
              ('.$idProd.','."'".$nomProd."'".','."'".$CantAct."'".','."'".$PrecUnit."'".')">Seleccionar</button>'],
              'Actualizar'=>['<button type="button" class="btn btn-primary" onclick="showModalImg()"><i class="fa fa-file-image-o"></i></button>']
          );
      }
      echo json_encode($datos);

    }
    public function cambiarEstado()
    {

    }
}
