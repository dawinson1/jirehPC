<?php
namespace Mini\Model;

use Mini\Core\Model;

class editPerfil extends Model
{

    private $id_cliente;
    private $nombreCliente;
    private $apellidoCliente;
    private $correoCliente;
    private $direccionCliente;
    private $telefono;
    private $contrasena;

    private $nombre;
    private $apellido;
    private $correo;
    private $pass;
    private $idEmpleado;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function srchdemp($idemp)
    {
        $sql = "SELECT nombre, apellido, telefono, correo, Url_imgEmpleado, id_rol FROM empleado
        WHERE idEmpleado = $idemp";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function srchdcli($idcli)
    {
        $sql = "SELECT nombreCliente, apellidoCliente, telefono, correoCliente, direccionCliente, Url_imgClient, rolCliente FROM cliente
        WHERE id_cliente = $idcli";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //editar nombre cliente
    public function edtNomCli()
    {
      $_SESSION['username']=$this->nombreCliente;
      $sql = "UPDATE cliente SET nombreCliente = ? WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->nombreCliente);
      $query->bindParam(2,$this->id_cliente);
      return $query->execute();
    }

    //editar nombre empleado
    public function edtNomEmp()
    {
      $_SESSION['username']=$this->nombre;
      $sql = "UPDATE empleado SET nombre = ? WHERE idEmpleado = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->nombre);
      $query->bindParam(2,$this->idEmpleado);
      return $query->execute();
    }

    //editar apellido cliente
    public function edtApeCli()
    {
      $_SESSION['surname']=$this->apellidoCliente;
      $sql = "UPDATE cliente SET apellidoCliente = ? WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->apellidoCliente);
      $query->bindParam(2,$this->id_cliente);
      return $query->execute();
    }

    //editar apellido empleado
    public function edtApeEmp()
    {
      $_SESSION['surname']=$this->apellido;
      $sql = "UPDATE empleado SET apellido = ? WHERE idEmpleado = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->apellido);
      $query->bindParam(2,$this->idEmpleado);
      return $query->execute();
    }

    //editar telefono cliente
    public function edtTelCli()
    {
      $sql = "UPDATE cliente SET telefono = ? WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->telefono);
      $query->bindParam(2,$this->id_cliente);
      return $query->execute();
    }

    //editar telefono empleado
    public function edtTelEmp()
    {
      $sql = "UPDATE empleado SET telefono = ? WHERE idEmpleado = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->telefono);
      $query->bindParam(2,$this->idEmpleado);
      return $query->execute();
    }

    //editar correo cliente
    public function edtCorCli()
    {
      $sql = "UPDATE cliente SET correoCliente = ? WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->correoCliente);
      $query->bindParam(2,$this->id_cliente);
      return $query->execute();
    }

    //editar correo empleado
    public function edtCorEmp()
    {
      $sql = "UPDATE empleado SET correo = ? WHERE idEmpleado = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->correo);
      $query->bindParam(2,$this->idEmpleado);
      return $query->execute();
    }

    //editar contraseña cliente
    public function edtPasCli()
    {
      $sql = "UPDATE cliente SET contrasena = ? WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->contrasena);
      $query->bindParam(2,$this->id_cliente);
      return $query->execute();
    }

    //editar contraseña empleado
    public function edtPasEmp()
    {
      $sql = "UPDATE empleado SET pass = ? WHERE idEmpleado = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->pass);
      $query->bindParam(2,$this->idEmpleado);
      return $query->execute();
    }
    //editar imagen cliente
    public function editarImgCliente()
    {
      $_SESSION['imgPerfil']=$this->Url_imgClient;
      $sql = "UPDATE cliente SET Url_imgClient = ? WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Url_imgClient);
      $query->bindParam(2,$this->id_cliente);
      return $query->execute();
    }

    //editar imagen empleado
    public function editarImgEmpleado()
    {
      $_SESSION['imgPerfil']=$this->Url_imgEmpleado;
      $sql = "UPDATE empleado SET Url_imgEmpleado = ? WHERE idEmpleado = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Url_imgEmpleado);
      $query->bindParam(2,$this->idEmpleado);
      return $query->execute();
    }

    //editar dirección cliente
    public function edtDccCli()
    {
      $_SESSION['imgPerfil']=$this->direccionCliente;
      $sql = "UPDATE cliente SET direccionCliente = ? WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->direccionCliente);
      $query->bindParam(2,$this->id_cliente);
      return $query->execute();
    }
} ?>
