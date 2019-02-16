<?php
namespace Mini\Model;

use Mini\Core\Model;

class categoria extends Model
{

    private $id_categoria;
    private $Nombre;
    private $idEstado;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarCategoria()
    {
        $sql = "SELECT c.*, e.Nombre as nombreEstadoCat FROM categoria c INNER JOIN estadosproduct e ON c.idEstado = e.idestadosproduct";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

    public function crearCategoria()
    {
        $sql = "INSERT INTO categoria (Nombre,idEstado) VALUES (?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        $query->bindParam(2,$this->idEstado);
        return $query->execute();
    }


    public function editarCategoria()
    {
        $sql = "UPDATE categoria SET Nombre = ? WHERE id_categoria = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        $query->bindParam(2,$this->id_categoria);
        return $query->execute();
    }

    public function eliminarCategoria()
    {
        $sql = "DELETE FROM categoria WHERE id_categoria = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_categoria);
        return $query->execute();

    }

    public function cambiarEstadoCategoria()
    {
        $sql = "UPDATE categoria set idEstado=? where id_categoria=?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->idEstado);
        $query->bindParam(2,$this->id_categoria);
        return $query->execute();

    }
}