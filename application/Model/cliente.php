<?php
namespace Mini\Model;

use Mini\Core\Model;

class cliente extends Model
{

    private $id_cliente;
    private $nombreCliente;
    private $apellidoCliente;
    private $correoCliente;
    private $direccionCliente;
    private $telefono;
    private $contrasena;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarClientes()
    {
        $sql = "SELECT * FROM cliente";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function crearCliente()
    {
        $sql = "INSERT INTO cliente (id_cliente, nombreCliente, apellidoCliente,correoCliente,direccionCliente,telefono,contrasena) VALUES (?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_cliente);
        $query->bindParam(2,$this->nombreCliente);
        $query->bindParam(3,$this->apellidoCliente);
        $query->bindParam(4,$this->correoCliente);
        $query->bindParam(5,$this->direccionCliente);
        $query->bindParam(6,$this->telefono);
        $query->bindParam(7,$this->contrasena);
        return $query->execute();
    }


    public function editarCliente()
    {
        $sql = "UPDATE cliente SET nombreCliente = ?, apellidoCliente = ?, correoCliente = ?,direccionCliente = ?,telefono = ?,contrasena = ? WHERE id_cliente = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->nombreCliente);
        $query->bindParam(2,$this->apellidoCliente);
        $query->bindParam(3,$this->correoCliente);
        $query->bindParam(4,$this->direccionCliente);
        $query->bindParam(5,$this->telefono);
        $query->bindParam(6,$this->contrasena);
        $query->bindParam(7,$this->id_cliente);
        return $query->execute();
    }

    public function eliminarCliente()
    {
        $sql = "DELETE FROM cliente WHERE id_cliente = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_cliente);
        return $query->execute();

    }
}