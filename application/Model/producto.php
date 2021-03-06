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
    private $idMarca;
    private $Url_imgProduct;
    private $estadosproduct_idestadosproduct;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarProductos()
    {
        $sql = "SELECT p.*,cate.Nombre as nombrecate, marc.idmarca as marcaID, marc.Nombre as marca, est.Nombre as nombreEstadoPro FROM producto p
        INNER JOIN categoria cate ON cate.id_categoria = p.id_categoria
        INNER JOIN marca marc ON marc.idmarca = p.idMarca
        INNER JOIN estadosproduct est ON est.idestadosproduct = p.estadosproduct_idestadosproduct";
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

    public function listarMarca()
    {
        $sql = "SELECT * FROM marca";
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
        $sql = "SELECT referencia, nombreProducto, cantidad, precioUnit, m.Nombre as marca, c.Nombre as categoria, Url_imgProduct FROM producto p
        INNER JOIN marca m ON m.idmarca = p.idMarca
        INNER JOIN categoria c ON c.id_categoria = p.id_categoria";
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

        $sql = "INSERT INTO producto (referencia, id_categoria, nombreProducto,cantidad,stock,precioUnit,idMarca,Url_imgProduct,estadosproduct_idestadosproduct) VALUES (?,?,?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->referencia);
        $query->bindParam(2,$this->id_categoria);
        $query->bindParam(3,$this->nombreProducto);
        $query->bindParam(4,$this->cantidad);
        $query->bindParam(5,$this->stock);
        $query->bindParam(6,$this->precioUnit);
        $query->bindParam(7,$this->idMarca);
        $query->bindParam(8,$this->Url_imgProduct);
        $query->bindParam(9,$this->estadosproduct_idestadosproduct);
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
        $sql = "UPDATE producto SET id_categoria = ?, nombreProducto = ?, cantidad = ?,stock = ?,precioUnit = ?,idMarca = ? WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_categoria);
        $query->bindParam(2,$this->nombreProducto);
        $query->bindParam(3,$this->cantidad);
        $query->bindParam(4,$this->stock);
        $query->bindParam(5,$this->precioUnit);
        $query->bindParam(6,$this->idMarca);
        $query->bindParam(7,$this->referencia);
        return $query->execute();
    }

    public function cambiarEstadoProd()
    {
        $sql = "UPDATE producto SET estadosproduct_idestadosproduct = ? WHERE referencia = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->estadosproduct_idestadosproduct);
        $query->bindParam(2,$this->referencia);
        return $query->execute();

    }

    public function pagProducts($limit, $start_from)
    {
      $sql = "SELECT p.*, m.Nombre AS marca, c.Nombre AS categoria FROM producto p
      INNER JOIN marca m ON m.idmarca = p.idMarca
      INNER JOIN categoria c ON c.id_categoria = p.id_categoria
      WHERE P.estadosproduct_idestadosproduct = 1
      ORDER BY referencia ASC LIMIT $start_from, $limit";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }

    //CONSULTA POR CATEGORIA
    public function pagProductsBYcat($limit, $start_from, $Scat)
    {
      $sql = "SELECT p.*, m.Nombre AS marca, c.Nombre AS categoria FROM producto p
      INNER JOIN marca m ON m.idmarca = p.idMarca
      INNER JOIN categoria c ON c.id_categoria = p.id_categoria
      WHERE P.estadosproduct_idestadosproduct = 1
      AND p.id_categoria = $Scat
      ORDER BY referencia ASC LIMIT $start_from, $limit";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }
    //CONTADOR PARA LA BUSQUEDA POR CATEGORIA
    public function countCatalogoBYcat($Scat)
    {
        $sql = "SELECT COUNT(*) AS conteo FROM producto
        WHERE id_categoria = $Scat";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll()[0]['conteo'];
    }

    //CONSULTA POR MARCA
    public function pagProductsBYmc($limit, $start_from, $Smc)
    {
      $sql = "SELECT p.*, m.Nombre AS marca, c.Nombre AS categoria FROM producto p
      INNER JOIN marca m ON m.idmarca = p.idMarca
      INNER JOIN categoria c ON c.id_categoria = p.id_categoria
      WHERE P.estadosproduct_idestadosproduct = 1
      AND p.idMarca = $Smc
      ORDER BY referencia ASC LIMIT $start_from, $limit";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }
    //CONTADOR PARA LA BUSQUEDA POR MARCA
    public function countCatalogoBYmc($Smc)
    {
        $sql = "SELECT COUNT(*) AS conteo FROM producto
        WHERE idMarca = $Smc";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll()[0]['conteo'];
    }

    //CONSULTA POR MARCA y CATEGORIA
    public function pagProductsBYmcycat($limit, $start_from, $Smc, $Scat)
    {
      $sql = "SELECT p.*, m.Nombre AS marca, c.Nombre AS categoria FROM producto p
      INNER JOIN marca m ON m.idmarca = p.idMarca
      INNER JOIN categoria c ON c.id_categoria = p.id_categoria
      WHERE P.estadosproduct_idestadosproduct = 1
      AND p.idMarca = $Smc AND p.id_categoria = $Scat
      ORDER BY referencia ASC LIMIT $start_from, $limit";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }
    //CONTADOR PARA LA BUSQUEDA POR MARCA y CATEGORIA
    public function countCatalogoBYmcycat($Smc, $Scat)
    {
        $sql = "SELECT COUNT(*) AS conteo FROM producto
        WHERE idMarca = $Smc AND id_categoria = $Scat";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll()[0]['conteo'];
    }
}
