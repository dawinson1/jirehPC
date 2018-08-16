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
               'Editar'=>['<button type="button" class="btn btn-primary" id="editCliente" onclick="editarCliente
               ('.$idC.','."'".$nomC."'".','."'".$apeC."'".','."'".$CorrC."'".','."'".$dicCl."'".','."'".$telC."'".','."'".$contrC."'".',)">Editar</button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarCliente('.$idC.')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }
    
    public function editarCliente()
    {
        $idCli = $_POST['identificador'];  
        $nomCli = $_POST['nomCliente'];  
        $apeCli = $_POST['apeCliente'];  
        $corCli = $_POST['correoCliente'];  
        $dicCli = $_POST['direcCliente'];  
        $telCli = $_POST['telCliente'];  
        $passCli = $_POST['passCliente']; 

        echo 'header("location:<?php echo URL; ?>editCliente");
        <input type="text" class="form-control" placeholder="Ingrese su número de cedula o el NIT de la empresa"
        name="identificador" id="identificador" value="'.$idCli.'">

        <input type="text" class="form-control" placeholder="Ingrese sus nombres"
        name="nomCliente" id="nomCliente" value="'."'".$nomCli."'".'">

        <input type="text" class="form-control" placeholder="Ingrese sus apellidos"
        name="apeCliente" id="apeCliente" value="'."'".$apeCli."'".'">

        <input type="email" class="form-control" placeholder="example@domain.com"
        name="correoCliente" id="correoCliente" value="'."'".$corCli."'".'">

        <input type="text" class="form-control" placeholder="Ingrese la direccion de su hogar"
        name="direcCliente" id="direcCliente" value="'."'".$dicCli."'".'">

        <input type="text" class="form-control" placeholder="Ingrese su número teléfonico"
        name="telCliente" id="telCliente" value="'."'".$telCli."'".'">

        <input type="password" class="form-control" placeholder="Ingrese su Contraseña"
        name="passCliente" id="passCliente" value="'."'".$passCli."'".'">
        ';  
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
        echo $this->cliente->crearCliente();  
    }
    public function modificarCliente()
    {
        $this->cliente->set('id_cliente',$_POST['identificador']);  
        $this->cliente->set('nombreCliente',$_POST['nomCliente']);  
        $this->cliente->set('apellidoCliente',$_POST['apeCliente']);  
        $this->cliente->set('correoCliente',$_POST['correoCliente']);  
        $this->cliente->set('direccionCliente',$_POST['direcCliente']);  
        $this->cliente->set('telefono',$_POST['telCliente']);  
        $this->cliente->set('contrasena',password_hash($_POST["passCliente"],PASSWORD_BCRYPT));
        echo $this->cliente->modificarCliente();  
    }

    public function eliminarCliente()
    {
        $this->cliente->set('id_cliente',$_POST['identificador']);  
        echo $this->cliente->eliminarCliente();  
    }

    public function cambiarEstado()
    {
        
    }
}