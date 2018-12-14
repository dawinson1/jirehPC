<?php
namespace Mini\Model;

use Mini\Core\Model;

class detalle_entrada extends Model
{

    private $idDetalle_entrada;
    private $producto_referencia;
    private $entrada_identrada;
    private $cantidad;
    private $motivo;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function verEntradas()
    {
        $sql = "SELECT pr.referencia AS refer, pr.nombreProducto AS nomPro,
        dp.cantidad AS cantSoli, dp.motivo AS motivoEnt
        FROM detalle_entrada dp
        INNER JOIN producto pr ON (pr.referencia = dp.Producto_Referencia)
        INNER JOIN entrada ent ON (ent.identrada = dp.entrada_identrada)
        WHERE ent.identrada = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Pedido_idPedido);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarEntradas()
    {
      $sql = "SELECT ent.*, tent.Nombre AS nomEnt, e.nombre AS nomEmplo
      FROM entrada ent
      INNER JOIN tipo_de_entrada tent ON (tent.Id_tipoEnt = ent.idTipo_Entrada)
      INNER JOIN empleado e ON (e.idEmpleado = ent.id_empleado)";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }

    public function ultimaEntrada()
    {
      $sql = "SELECT max(identrada) as idEntrada FROM entrada";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetch();
    }

    public function saveDetailsEnt()
    {
        $sql = "INSERT INTO detalle_entrada VALUES (NULL,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->producto_referencia);
        $query->bindParam(2,$this->entrada_identrada);
        $query->bindParam(3,$this->cantidad);
        $query->bindParam(4,$this->motivo);
        $saveDetaEnt = $query->execute();

        if ($saveDetaEnt) {
          return true;
        } else {
          return false;
        }
    }

    public function updateDetails()
    {
      $sql = "UPDATE detalle_pedido SET Producto_Referencia = ?, Pedido_idPedido = ?,
      cantidad = ?, valor_unit = ?, valor_total = ?
      WHERE idDetalle_pedido = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Producto_Referencia);
      $query->bindParam(2,$this->Pedido_idPedido);
      $query->bindParam(3,$this->entrada_identrada);
      $query->bindParam(4,$this->valor_unit);
      $query->bindParam(5,$this->valor_total);
      $query->bindParam(6,$this->idDetalle_pedido);
      return $query->execute();
    }

    public function deleteDetails()
    {
        $sql = "DELETE FROM detalle_pedido WHERE idDetalle_pedido = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->idDetalle_pedido);
        return $query->execute();
    }

    public function buscarProducto()
    {
        $sql = "SELECT * FROM producto WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->referencia);
        return $query->execute();
    }

    public function crearProducto()
    {
        $sql = "INSERT INTO producto (referencia, id_categoria, nombreProducto,cantidad,stock,precioUnit,marca,Url_imgProduct) VALUES (?,?,?,?,?,?,?,?)";
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

    public function actualizarStock()// habrá que probar esta función solo para actualizar el campo stock en bd.
                                     // porque todavia no tengo claro como se agrega al stock por medio de la cantidad.
    {
        $sql = "UPDATE producto SET (stock = stock + cantidad) = ? WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->stock);
        $query->bindParam(2,$this->referencia);
        return $query->execute();

    }

    public function editarImgProducto()
    {
      $sql = "UPDATE producto SET Url_imgProduct = ? WHERE referencia = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Url_imgProduct);
      $query->bindParam(2,$this->referencia);
      return $query->execute();
    }

    public function editarProducto()
    {
        $sql = "UPDATE producto SET id_categoria = ?, nombreProducto = ?, cantidad = ?,stock = ?,precioUnit = ?,marca = ? WHERE referencia = ?";
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

    public function eliminarProducto()
    {
        $sql = "DELETE FROM producto WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->referencia);
        return $query->execute();

    }

    public function pagProducts($limit, $start_from)
    {
      $sql = "SELECT * FROM producto ORDER BY referencia ASC LIMIT $start_from, $limit";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }
}
