<?php
namespace Mini\Controller;
use Mini\Model\editPerfil;
class editPerfilController
{
    private $prf;
    function __construct(){
        $this->prf = new editPerfil();
    }

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/editPerfil/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function srchd()
    {

      $rol = $_POST['serxrl'];

      if (($rol == 'Administrador') | ($rol == 'Técnico')) {

        $idemp = $_POST['serxid'];
        $dtsuser = $this->prf->srchdemp($idemp);
        echo json_encode($dtsuser);

      }else {

        $idcli = $_POST['serxid'];
        $dtsuser = $this->prf->srchdcli($idcli);
        echo json_encode($dtsuser);
      }

    }

    public function edtNom()
    {
        $rol = $_POST['serxrl'];

        if (($rol == 'Administrador') | ($rol == 'Técnico')) {

          $this->prf->set('idEmpleado',$_POST['serxid']);
          $this->prf->set('nombre',$_POST['nomUser']);
          echo $this->prf->edtNomEmp();

        }else {

          $this->prf->set('id_cliente',$_POST['serxid']);
          $this->prf->set('nombreCliente',$_POST['nomUser']);
          echo $this->prf->edtNomCli();
        }
    }

    public function edtApe()
    {
        $rol = $_POST['serxrl'];

        if (($rol == 'Administrador') | ($rol == 'Técnico')) {

          $this->prf->set('idEmpleado',$_POST['serxid']);
          $this->prf->set('apellido',$_POST['apeUser']);
          echo $this->prf->edtApeEmp();

        }else {

          $this->prf->set('id_cliente',$_POST['serxid']);
          $this->prf->set('apellidoCliente',$_POST['apeUser']);
          echo $this->prf->edtApeCli();
        }
    }

    public function edtTel()
    {
        $rol = $_POST['serxrl'];

        if (($rol == 'Administrador') | ($rol == 'Técnico')) {

          $this->prf->set('idEmpleado',$_POST['serxid']);
          $this->prf->set('telefono',$_POST['telUser']);
          echo $this->prf->edtTelEmp();

        }else {

          $this->prf->set('id_cliente',$_POST['serxid']);
          $this->prf->set('telefono',$_POST['telUser']);
          echo $this->prf->edtTelCli();
        }
    }

    public function edtCor()
    {
        $rol = $_POST['serxrl'];

        if (($rol == 'Administrador') | ($rol == 'Técnico')) {

          $this->prf->set('idEmpleado',$_POST['serxid']);
          $this->prf->set('correo',$_POST['corUser']);
          echo $this->prf->edtCorEmp();

        }else {

          $this->prf->set('id_cliente',$_POST['serxid']);
          $this->prf->set('correoCliente',$_POST['corUser']);
          echo $this->prf->edtCorCli();
        }
    }

    public function edtPas()
    {
        $rol = $_POST['serxrl'];

        if (($rol == 'Administrador') | ($rol == 'Técnico')) {

          $this->prf->set('idEmpleado',$_POST['serxid']);
          $this->prf->set('pass',password_hash($_POST["pasUser"],PASSWORD_BCRYPT));
          echo $this->prf->edtPasEmp();

        }else {

          $this->prf->set('id_cliente',$_POST['serxid']);
          $this->prf->set('contrasena',password_hash($_POST["pasUser"],PASSWORD_BCRYPT));
          echo $this->prf->edtPasCli();
        }
    }

    public function edtDcc()
    {
      $this->prf->set('id_cliente',$_POST['serxid']);
      $this->prf->set('direccionCliente',$_POST['dccUser']);
      echo $this->prf->edtDccCli();

    }

    public function actImg()
    {
      $rol = $_SESSION['Rol'];

      if (($rol == 'Administrador') | ($rol == 'Técnico')) {

        $this->prf->set('idEmpleado',$_POST['usidimg']);

        //Declaramos las variables que necesitaremos para la validacion de la imagen
        $id_Empleado = $_POST['usidimg']; // esta variable sirve para guardar la imagen en una carpeta con su  id
        $imgPerfil = $_FILES['imguser']; // aqui guardamos el nombre de la imagen

        if ($imgPerfil["error"]>0) { // verifica si el Archivo no contenga algun error
          echo "Error Archivo";
        } else { // si el archivo está esta bien procedera a ejecutar la siguientes instrucciones

          $imgPermitidas = array("image/png", "image/jpg", "image/jpeg"); //array que contiene la extension de imagenes permitidas

          if (in_array($imgPerfil["type"], $imgPermitidas)) { // validacion si el tipo de imagen es valida

            $ruta = 'img/perfiles/'.$id_Empleado.'/'; //ruta en donde se guardará la imagen
            $nombreImg = $ruta.$imgPerfil["name"]; //nombre de la imagen con la ruta concatenada

            if (!file_exists($ruta)) { // valida si la carpeta no existá, si es así, la crea
              mkdir($ruta);
            }
            /*
            if (!file_exists($nombreImg)) { //si la imagen no existe, procedera a mover la imagen a la carpeta (opcional)
            */
              $resultado = @move_uploaded_file($imgPerfil["tmp_name"], $nombreImg);

              if ($resultado) { //si el resutado es verdadero envio los datos al Modelo

                $this->prf->set('Url_imgEmpleado',$nombreImg);
                echo $this->prf->editarImgEmpleado();

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

      } else {

        $this->prf->set('id_cliente',$_POST['usidimg']);

        //Declaramos las variables que necesitaremos para la validacion de la imagen
        $idCliente = $_POST['usidimg']; // esta variable sirve para guardar la imagen en una carpeta con su  id
        $imgPerfil = $_FILES['imguser']; // aqui guardamos el nombre de la imagen

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

                $this->prf->set('Url_imgClient',$nombreImg);
                echo $this->prf->editarImgCliente();

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

    }

}
