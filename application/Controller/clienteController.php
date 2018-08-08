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

    public function editCliente()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/cliente/editCliente.php';
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
           $contrC = $value['contrasena'];

           $datos[] = array(
               'Cedula o NIT'=> $value['id_cliente'],
               'Nombre'=>$value['nombreCliente'],
               'Apellido'=>$value['apellidoCliente'],
               'Correo'=>$value['correoCliente'],
               'Dirección'=>$value['direccionCliente'],
               'Telefono'=>$value['telefono'],
               'Contraseña'=>$value['contrasena'],
               'Editar'=>['<button type="button" class="btn btn-primary" id="editCliente" onclick="editarCliente
               ('.$idC.','."'".$nomC."'".','."'".$apeC."'".','."'".$CorrC."'".','."'".$dicCl."'".','."'".$telC."'".','."'".$contrC."'".',)">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarCliente()">Eliminar</button>']
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
        $this->cliente->set('contrasena',$_POST['passCliente']);
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
        $this->cliente->set('contrasena',$_POST['passCliente']);
        echo $this->cliente->editarCliente();  
    }

    public function cambiarEstado()
    {
        
    }

}