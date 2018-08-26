<?php
namespace Mini\Model;

use Mini\Core\Model;

class estado_pedido extends Model
{

    private $idEstadoPedido;
    private $Nombre;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarEstadosPedidos()
    {
        $sql = "SELECT * FROM estado_pedido";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

    public function crearEstadoPedido()
    {
        $sql = "INSERT INTO estado_pedido (Nombre) VALUES (?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        return $query->execute();
    }


    public function editarEstadoPedido()
    {
        $sql = "UPDATE estado_pedido SET Nombre = ? WHERE idEstadoPedido = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        $query->bindParam(2,$this->idEstadoPedido);
        return $query->execute();
    }

    public function eliminarEstadoPedido()
    {
        $sql = "DELETE FROM estado_pedido WHERE idEstadoPedido = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->idEstadoPedido);
        return $query->execute();

    }
}