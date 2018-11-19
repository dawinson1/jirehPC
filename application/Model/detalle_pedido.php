<?php
namespace Mini\Model;

use Mini\Core\Model;

class detalle_pedido extends Model
{

    private $idDetalle_pedido;
    private $Producto_Referencia;
    private $Pedido_idPedido;
    private $cantidad;
    private $valor_unit;
    private $valor_subTotal;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function verPedidos()
    {
        $sql = "SELECT p.idCliente AS idCli, c.nombreCliente as nomCli, e.idEmpleado AS idEmp,
		    e.nombre AS nomEmp, p.fechaEntrega AS entrega, pr.referencia AS refer,
		    pr.nombreProducto AS nomPro, dp.cantidad AS cantSoli,
        dp.valor_unit AS Vcu, dp.valor_subTotal AS Vsub,
        p.total AS Vtot, p.id_pedido AS IDPedido
        FROM detalle_pedido dp
        INNER JOIN producto pr ON (pr.referencia = dp.Producto_Referencia)
        INNER JOIN pedido p ON (p.id_pedido = dp.Pedido_idPedido)
        INNER JOIN empleado e ON (e.idEmpleado = p.id_empleado)
        INNER JOIN cliente c ON (c.id_cliente = p.idCliente)
        WHERE p.id_pedido = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Pedido_idPedido);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarPedidos()
    {
      $sql = "SELECT p.*, est.Nombre AS nomEst, c.nombreCliente AS nomCli,
      e.nombre AS nomEmplo
      FROM pedido p
      INNER JOIN estado_pedido est ON (est.idEstadoPedido = p.idEstado_pedido)
      INNER JOIN empleado e ON (e.idEmpleado = p.id_empleado)
      INNER JOIN cliente c ON (c.id_cliente = p.idCliente)";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }

    public function ultimoPedido()
    {
      $sql = "SELECT max(id_pedido) as idPedido FROM pedido";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetch();
    }

    public function saveDetails()
    {
        $sql = "INSERT INTO detalle_pedido VALUES (NULL,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Producto_Referencia);
        $query->bindParam(2,$this->Pedido_idPedido);
        $query->bindParam(3,$this->cantidad);
        $query->bindParam(4,$this->valor_unit);
        $query->bindParam(5,$this->valor_subTotal);
        $saveDeta = $query->execute();

        if ($saveDeta) {
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
      $query->bindParam(3,$this->cantidad);
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
