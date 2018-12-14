<?php
namespace Mini\Model;

use Mini\Core\Model;

class detalle_salida extends Model
{

    private $idDetalle_salida;
    private $producto_referencia;
    private $salida_idsalida;
    private $cantidad;
    private $motivo;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function verSalidas()
    {
        $sql = "SELECT pr.referencia AS refer, pr.nombreProducto AS nomPro,
        dp.cantidad AS cantSoli, dp.motivo AS motivoSali
        FROM detalle_salida dp
        INNER JOIN producto pr ON (pr.referencia = dp.Producto_Referencia)
        INNER JOIN salida sali ON (sali.idsalida = dp.salida_idsalida)
        WHERE sali.idsalida = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Pedido_idPedido);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarSalidas()
    {
      $sql = "SELECT sali.*, tsali.Nombre AS nomSali, e.nombre AS nomEmplo
      FROM salida sali
      INNER JOIN tipo_de_salida tsali ON (tsali.idTipo_salida = sali.idTipo_Salida)
      INNER JOIN empleado e ON (e.idEmpleado = sali.id_empleado)";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }

    public function ultimaSalida()
    {
      $sql = "SELECT max(idsalida) as idSalida FROM salida";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetch();
    }

    public function saveDetailsSali()
    {
        $sql = "INSERT INTO detalle_salida VALUES (NULL,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->producto_referencia);
        $query->bindParam(2,$this->salida_idsalida);
        $query->bindParam(3,$this->cantidad);
        $query->bindParam(4,$this->motivo);
        $saveDetaSali = $query->execute();

        if ($saveDetaSali) {
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
