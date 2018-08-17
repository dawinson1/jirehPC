<?php
namespace Mini\Model;

use Mini\Core\Model;

class estados extends Model
{

    private $id_estado;
    private $nombre;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarEstados()
    {
        $sql = "SELECT * FROM estados";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

    public function crearEstado()
    {
        $sql = "INSERT INTO estados (nombre) VALUES (?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->nombre);
        return $query->execute();
    }


    public function editarEstado()
    {
        $sql = "UPDATE estados SET nombre = ? WHERE id_estado = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->nombre);
        $query->bindParam(2,$this->id_estado);
        return $query->execute();
    }

    public function eliminarEstado()
    {
        $sql = "DELETE FROM estados WHERE id_estado = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_estado);
        return $query->execute();

    }
}