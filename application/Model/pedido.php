<?php
namespace Mini\Model;

use Mini\Core\Model;

class pedido extends Model
{

    private $referencia;
    private $id_categoria		;
    private $nombreProducto;
    private $cantidad;
    private $stock;
    private $precioUnit;
    private $marca;
    private $Url_imgProduct;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
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

    public function crearPedidos()
    {
        $sql = "INSERT INTO pedido (referencia, id_categoria, nombreProducto,cantidad,stock,precioUnit,marca,Url_imgProduct) VALUES (?,?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->referencia);
        $query->bindParam(2,$this->id_categoria);
        $query->bindParam(3,$this->nombreProducto);
        $query->bindParam(4,$this->cantidad);
        $query->bindParam(5,$this->stock);
        $query->bindParam(6,$this->precioUnit);
        $query->bindParam(7,$this->marca);
        $query->bindParam(8,$this->Url_imgProduct);
        return $query->execute();

    }

    public function editarImgPedidos()
    {
      $sql = "UPDATE pedido SET Url_imgProduct = ? WHERE referencia = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Url_imgProduct);
      $query->bindParam(2,$this->referencia);
      return $query->execute();
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
