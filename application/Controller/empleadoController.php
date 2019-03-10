<?php

namespace Mini\Controller;

use Mini\Model\empleado;

class empleadoController
{
    private $empleado;
    function __construct(){
        $this->empleado = new empleado();
    }

    public function index()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/empleado/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formEmpleado()
    {
      if (!($_SESSION['Rol'] == 'Administrador')) {
        header('Location: /Proyecto/jirehPC/error/error500');
      }
        require APP . 'view/_templates/header.php';
        require APP . 'view/empleado/formEmpleado.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarEmpleado()
    {
       $empleado = $this->empleado->listarEmpleados();
       foreach($empleado as $value){
           $idEm = $value['idEmpleado'];
           $nomEm= $value['nombre'];
           $apeEm= $value['apellido'];
           $telEm= $value['telefono'];
           $mailEm= $value['correo'];
           $nomRol= $value['nombrerol']; // se cambió por nombrerol para que apareciera el nombre del rol en la tabla
           $idRol= $value['id_rol'];
           $idEstado =$value['id_estado'];
           $nomEstEmp =$value['nombreEstadoEmp'];
           $imgE = $value['Url_imgEmpleado'];
           $idEstado =  $value['id_estado']==5?6:5;
           $check = $idEstado==5?"checked":"";
           $datos[] = array(
               'Nombre'=> $value['nombre'],
               'Apellido'=>$value['apellido'],
               'Teléfono'=>$value['telefono'],
               'Correo'=>$value['correo'],
               'Cédula'=>$value['idEmpleado'],
               'Rol'=>$value['nombrerol'],
               'Estado'=>$value['nombreEstadoEmp'],
               'Editar'=>['<button type="button" class="btn btn-primary" id="editEmpleado" onclick="editarEmpleado
               ('.$idEm.','."'".$nomEm."'".','."'".$apeEm."'".','."'".$telEm."'".','."'".$mailEm."'".','."'".$idRol."'".','."'".$idEstado."'".',)">Editar</button>'],
               'Foto Perfil'=>$value['Url_imgEmpleado'],
               'Actualizar Foto'=>['<button type="button" class="btn btn-primary" onclick="showModalImg('.$idEm.')"><i class="fa fa-file-image-o"></i></button>'],
               'Eliminar'=>['<input type="checkbox" '.$check.' onchange="changeStatusEmp('."'".$idEstado."'".','."'".$idEm."'".')" id="toggleEmp_'.$idEm.'"
               class="toggle-Empleado estEmp'.$idEstado.'" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Activar" data-off="Inactivar">']
           );
       }
       echo json_encode($datos);
    }

    public function crearEmpleado()
    {
        $this->empleado->set('nombre',$_POST['nombre']);
        $this->empleado->set('apellido',$_POST['apellido']);
        $this->empleado->set('telefono',$_POST['telefono']);
        $this->empleado->set('correo',$_POST['correo']);
        $this->empleado->set('pass',password_hash($_POST["passEmpl"],PASSWORD_BCRYPT));
        $this->empleado->set('idEmpleado',$_POST['idEmpleado']);
        $this->empleado->set('id_rol',$_POST['id_rol']);
        $this->empleado->set('id_estado',$_POST['id_estado']);
        $this->empleado->set('Url_imgEmpleado',$_POST['perfilEmpleado']);
        echo $this->empleado->crearEmpleado();
    }

    public function editarEmpleado()
    {
        $this->empleado->set('nombre',$_POST['nombre']);
        $this->empleado->set('apellido',$_POST['apellido']);
        $this->empleado->set('telefono',$_POST['telefono']);
        $this->empleado->set('correo',$_POST['correo']);
        $this->empleado->set('idEmpleado',$_POST['idEmpleado']);
        $this->empleado->set('id_rol',$_POST['id_rol']);
        $this->empleado->set('id_estado',$_POST['id_estado']);
        echo $this->empleado->editarEmpleado();
    }

    public function actImgEmpleado()
    {
        $this->empleado->set('idEmpleado',$_POST['idEmpleadoimg']);

        //Declaramos las variables que necesitaremos para la validacion de la imagen
        $id_Empleado = $_POST['idEmpleadoimg']; // esta variable sirve para guardar la imagen en una carpeta con su  id
        $imgPerfil = $_FILES['imgEmpleado']; // aqui guardamos el nombre de la imagen

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

                $this->empleado->set('Url_imgEmpleado',$nombreImg);
                echo $this->empleado->editarImgEmpleado();

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

    public function cambiarEstadoEmp()
    {
      $this->empleado->set('id_estado',$_POST[('idEstEmp')]);
      $this->empleado->set('idEmpleado',$_POST[('idEmpleado')]); /*el de la izq es de la bd, izq viene por ajax*/
      echo $this->empleado->cambiarEstadoEmp();
    }

    public function listarRoles()
    {
      $empleado = $this->empleado->listarRoles();
      echo json_encode($empleado);
    }

    public function listarEstados()
    {
      $empleado = $this->empleado->listarEstados();
      echo json_encode($empleado);
    }

}
