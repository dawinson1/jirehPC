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

    public function listarEmpleado()
    {
       $empleado = $this->empleado->listarEmpleados();
       foreach($empleado as $value){
           $datos[] = array(
               'Nombre'=> $value['nombre'],
               'apellido'=>$value['apellido'],
               'telefono'=>$value['telefono'],
               'correo'=>$value['correo'],
               'nombrerol'=>$value['nombrerol'],
               'id_estado'=>$value['id_estado']
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
        $this->empleado->set('id_rol',$_POST['id_rol']);  
        $this->empleado->set('id_estado',$_POST['id_estado']);  
        $this->empleado->set('idEmpleado',$_POST['idEmpleado']);
        $g = $this->empleado->crearEmpleado();
        echo $g;  
    }

    public function editarEmpleado()
    {
        
    }

    public function cambiarEstado()
    {
     
    }

}
