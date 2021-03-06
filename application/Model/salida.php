<?php
namespace Mini\Model;

use Mini\Core\Model;

class salida extends Model
{
    private $idsalida;
    private $id_empleado;
    private $fechaSalida;
    private $idTipo_Salida;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarProductos()
    {
        $sql = "SELECT * FROM producto";
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

    public function crearSalida()
    {
        $sql = "INSERT INTO salida (id_empleado, fechaSalida, idTipo_Salida) VALUES (?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_empleado);
        $query->bindParam(2,$this->fechaSalida);
        $query->bindParam(3,$this->idTipo_Salida);
        $entdGuardado = $query->execute();

        if ($entdGuardado) {
            echo 'salidaCreada';
        } else {
          echo 'errorCrearSalida';
        }

    }

    public function editarPedidos()
    {
        $sql = "UPDATE pedido SET id_categoria = ?, nombreProducto = ?, cantidad = ?,stock = ?,precioUnit = ?,marca = ? WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_categoria);
        $query->bindParam(2,$this->nombreProducto);
        $query->bindParam(3,$this->cantidad);
        $query->bindParam(4,$this->stock);
        $query->bindParam(5,$this->precioUnit);
        $query->bindParam(6,$this->marca);
        $query->bindParam(7,$this->referencia);
        return $query->execute();
    }

    public function eliminarPedidos()
    {
        $sql = "DELETE FROM pedido WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->referencia);
        return $query->execute();

    }
}
