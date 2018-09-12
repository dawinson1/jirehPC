<?php
namespace Mini\Controller;
use Mini\Model\producto;
class productoController
{
    private $producto;
    function __construct(){
        $this->producto = new producto();
    }
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function formProducto()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/formProducto.php';
        require APP . 'view/_templates/footer.php';
    }
    public function editCliente()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/editarProducto.php';
        require APP . 'view/_templates/footer.php';
    }
    public function listarCliente()
    {
       $cliente = $this->cliente->listarClientes();
       foreach($cliente as $value){
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

    public function actImgCliente()
    {
        $this->cliente->set('id_cliente',$_POST['idClientMimg']);

        //Declaramos las variables que necesitaremos para la validacion de la imagen
        $idCliente = $_POST['idClientMimg']; // esta variable sirve para guardar la imagen en una carpeta con su  id
        $imgPerfil = $_FILES['imgClient']; // aqui guardamos el nombre de la imagen

        if ($imgPerfil["error"]>0) { // verifica si el Archivo no contenga algun error
          echo "Error Archivo";
        } else { // si el archivo está esta bien procedera a ejecutar la siguientes instrucciones

          $imgPermitidas = array("image/gif", "image/png", "image/jpg", "image/jpeg"); //array que contiene la extension de imagenes permitidas

          if (in_array($imgPerfil["type"], $imgPermitidas)) { // validacion si el tipo de imagen es valida

            $ruta = 'img/perfiles/'.$idCliente.'/'; //ruta en donde se guardará la imagen
            $nombreImg = $ruta.$imgPerfil["name"]; //nombre de la imagen con la ruta cocatenada

            if (!file_exists($ruta)) { // valida si la carpeta no existá, si es así, la crea
              mkdir($ruta);
            }
            /*
            if (!file_exists($nombreImg)) { //si la imagen no existe, procedera a mover la imagen a la carpeta (opcional)
            */
              $resultado = @move_uploaded_file($imgPerfil["tmp_name"], $nombreImg);

              if ($resultado) { //si el resutado es verdadero envio los datos al Modelo

                $this->cliente->set('Url_imgClient',$nombreImg);
                echo $this->cliente->editarImgCliente();

              } else { //si llega haber alguna falla a guardar al imagen mostrará este mensaje
                echo "Error al guardar imagen";
              }

            /*} else { //si la imagen existe enviará este mensaje
              echo "La imagen ya existe";
            }*/

          } else { // si no es valida mostrará este echo
            echo "img no permitida";
          }

        } // fin validaciones

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
    public function cambiarEstado()
    {

    }
}
