<?php
namespace Mini\Model;

use Mini\Core\Model;

class producto extends Model
{

    private $referencia;
    private $id_categoria;
    private $nombreProducto;
    private $cantidad;
    private $stock;
    private $precioUnit;
    private $marca;
    private $Url_imgProduct;

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

    public function listarCategoria()
    {
        $sql = "SELECT * FROM categoria";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function selectProducts()
    {
        $sql = "SELECT referencia, nombreProducto FROM producto";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarCatalogo()
    {
        $sql = "SELECT referencia, nombreProducto, cantidad, precioUnit, marca, Url_imgProduct FROM producto";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function countCatalogo()
    {
        $sql = "SELECT COUNT(*) AS conteo FROM producto";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll()[0]['conteo'];
    }

    public function buscarProducto()
    {
        $sql = "SELECT * FROM producto WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->referencia);
        $query->execute();
        $busqueda = $query->fetchAll();

        if ($busqueda) {
          echo "ProductExist";

        } else {
          echo "ProductNotExist";
        }
    }

    public function productoEncontrado()
    {
      $sql = "SELECT * FROM producto WHERE referencia = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->referencia);
      $query->execute();
      return $query->fetchAll();
    }

    public function cantProducto($referP)
    {
        $sql = "SELECT cantidad FROM producto WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$referP);
        $query->execute();
        return $query->fetch();
    }

    public function updateCantProducto()
    {
        $sql = "UPDATE producto SET cantidad = ? WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->cantidad);
        $query->bindParam(2,$this->referencia);
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
        $registroP = $query->execute();

        if ($registroP) {
          return true;
        } else {
          return false;
        }

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
