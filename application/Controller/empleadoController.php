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
        require APP . 'view/_templates/header.php';
        require APP . 'view/empleado/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formEmpleado()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/empleado/formEmpleado.php';
        require APP . 'view/_templates/footer.php';
    }

    public function editEmpleado()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/empleado/editEmpleado.php';
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
           $idRol= $value['nombrerol']; // se cambió por nombrerol para que apareciera el nombre del rol en la tabla
           $idEstado =$value['id_estado'];
           $datos[] = array(
               'Nombre'=> $value['nombre'],
               'Apellido'=>$value['apellido'],
               'Teléfono'=>$value['telefono'],
               'Correo'=>$value['correo'],
               'Cédula'=>$value['idEmpleado'],
               'Rol'=>$value['nombrerol'],
               'Estado'=>$value['id_estado'],
               'Editar'=>['<button type="button" class="btn btn-primary" id="editEmpleado" onclick="editarEmpleado
               ('.$idEm.','."'".$nomEm."'".','."'".$apeEm."'".','."'".$telEm."'".','."'".$mailEm."'".','."'".$idRol."'".','."'".$idEstado."'".',)">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarEmpleado('.$idEm.')">Eliminar</button>']
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

    public function eliminarEmpleado()
    {
        $this->empleado->set('idEmpleado',$_POST[('idEmpleado')]); /*el de la izq es de la bd, izq viene por ajax*/ 
        echo $this->empleado->eliminarEmpleado();  
    }

    public function cambiarEstado()
    {
     
    }

}
