<?php
namespace Mini\Controller;
use Mini\Model\cliente;
class clienteController
{
    private $cliente;
    function __construct(){
        $this->cliente = new cliente();
    }
    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/cliente/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function formCliente()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/cliente/formCliente.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarCliente()
    {
       $cliente = $this->cliente->listarClientes();
       foreach($cliente as $value){
           $idC = $value['id_cliente'];
           $nomC = $value['nombreCliente'];
           $apeC = $value['apellidoCliente'];
           $CorrC = $value['correoCliente'];
           $dicCl = $value['direccionCliente'];
           $telC = $value['telefono'];
           $idEstado =$value['estadiscli_idestadiscli'];
           $nomEstCli =$value['nombreEstadoCli'];
           $contrC = $value['contrasena'];
           $imgC = $value['Url_imgClient'];
           $idEstado =  $value['estadiscli_idestadiscli']==1?2:1;
           $check = $idEstado==1?"checked":"";

           $datos[] = array(
               'Cédula'=> $value['id_cliente'],
               'Nombre'=>$value['nombreCliente'],
               'Apellido'=>$value['apellidoCliente'],
               'Correo'=>$value['correoCliente'],
               'Dirección'=>$value['direccionCliente'],
               'EstadoCli'=>$value['nombreEstadoCli'],
               'Telefono'=>$value['telefono'],
               'Editar'=>['<button type="button" class="btn btn-primary" id="editCliente" onclick="editarCliente
               ('.$idC.','."'".$nomC."'".','."'".$apeC."'".','."'".$CorrC."'".','."'".$dicCl."'".','."'".$telC."'".','."'".$contrC."'".',)">Editar</button>'],
               'Foto Perfil'=>$value['Url_imgClient'],
               'Actualizar Foto'=>['<button type="button" class="btn btn-primary" onclick="showModalImg('.$idC.')"><i class="fa fa-file-image-o"></i></button>'],
               'Eliminar'=>['<input type="checkbox" '.$check.' onchange="changeStatusCli('."'".$idEstado."'".','."'".$idC."'".')" id="toggleCli_'.$idC.'"
               class="toggle-Cliente estCli'.$idEstado.'" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Activar" data-off="Inactivar">']
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
    $this->cliente->set('rolCliente',$_POST['rolCliente']);
    $this->cliente->set('estadiscli_idestadiscli',$_POST['estCli']);
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

    public function cambiarEstadoCli()
    {
      $this->cliente->set('id_cliente',$_POST['idCliente']);
      $this->cliente->set('estadiscli_idestadiscli',$_POST['idEstCli']);
      echo $this->cliente->cambiarEstadoCli();
    }

    public function listarEstadosCli()
    {
      $cliente = $this->cliente->listarEstClientes();
      echo json_encode($cliente);
    }
}
