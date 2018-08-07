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
        require APP . 'view/_templates/header.php';
        require APP . 'view/cliente/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formCliente()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/cliente/formCliente.php';
        require APP . 'view/_templates/footer.php';
    }

    public function listarCliente()
    {
       $cliente = $this->cliente->listarClientes();
       foreach($cliente as $value){
           $datos[] = array(
               'Cedula o NIT'=> $value['id_cliente'],
               'Nombre'=>$value['nombreCliente'],
               'Apellido'=>$value['apellidoCliente'],
               'Correo'=>$value['correoCliente'],
               'Dirección'=>$value['direccionCliente'],
               'Telefono'=>$value['telefono'],
               'Contraseña'=>$value['contrasena']
               //'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarEmpleado()">Editar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearCliente()
    {
        $this->empleado->set('id_cliente',$_POST['identificador']);  
        $this->empleado->set('nombreCliente',$_POST['nomCliente']);  
        $this->empleado->set('apellidoCliente',$_POST['apeCliente']);  
        $this->empleado->set('correoCliente',$_POST['correoCliente']);  
        $this->empleado->set('direccionCliente',$_POST['direcCliente']);  
        $this->empleado->set('telefono',$_POST['telCliente']);  
        $this->empleado->set('contrasena',$_POST['passCliente']);
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