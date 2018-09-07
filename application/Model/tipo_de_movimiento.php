<?php
namespace Mini\Model;

use Mini\Core\Model;

class tipo_de_movimiento extends Model
{

    private $Id_tipoMov;
    private $Nombre;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarTipoMov()
    {
        $sql = "SELECT * FROM tipo_de_movimiento";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

    public function crearTipoMov()
    {
        $sql = "INSERT INTO tipo_de_movimiento (Nombre) VALUES (?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        return $query->execute();
    }


    public function editarTipoMov()
    {
        $sql = "UPDATE tipo_de_movimiento SET Nombre = ? WHERE Id_tipoMov = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        $query->bindParam(2,$this->Id_tipoMov);
        return $query->execute();
    }

    public function eliminarTipoMov()
    {
        $sql = "DELETE FROM tipo_de_movimiento WHERE Id_tipoMov = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Id_tipoMov);
        return $query->execute();

    }
}