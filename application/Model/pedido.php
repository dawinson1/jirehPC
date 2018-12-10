<?php
namespace Mini\Model;

use Mini\Core\Model;

class pedido extends Model
{
    private $idCliente;
    private $fechaEntrega;
    private $id_empleado;
    private $idEstado_pedido;
    private $total;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarProductos()
    {
        $sql = "SELECT p.*,c.Nombre as nombreCate FROM producto p INNER JOIN categoria c ON c.id_categoria = p.id_categoria";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarClientes()
    {
        $sql = "SELECT * FROM cliente";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarEmpleados()
    {
        $sql = "SELECT * FROM empleado";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarEstadosPed()
    {
        $sql = "SELECT * FROM estado_pedido";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarPedidos()
    {
        $sql = "SELECT * FROM pedido";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function buscarPedidos()
    {
        $sql = "SELECT * FROM pedido WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->referencia);
        $query->execute();
        return $query->fetchAll();
    }

    private function ultimoPedido()
    {
      $sql = "SELECT max(id_pedido) as idPedido FROM pedido";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetch();
    }

    public function crearPedido()
    {
        $sql = "INSERT INTO pedido (idCliente, fechaEntrega, id_empleado, idEstado_pedido, total) VALUES (?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->idCliente);
        $query->bindParam(2,$this->fechaEntrega);
        $query->bindParam(3,$this->id_empleado);
        $query->bindParam(4,$this->idEstado_pedido);
        $query->bindParam(5,$this->total);
        $pedGuardado = $query->execute();

        if ($pedGuardado) {
          echo 'pedidoCreado';
        } else {
          echo 'errorCrearPedido';
        }

    }

    public function cambiarEstadoPed()
    {
        $sql = "UPDATE pedido SET idEstado_pedido = ? WHERE id_pedido = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->idEstado_pedido);
        $query->bindParam(2,$this->id_pedido);
        return $query->execute();
    }
}
