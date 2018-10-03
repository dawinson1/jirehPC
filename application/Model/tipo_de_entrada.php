<?php
namespace Mini\Model;

use Mini\Core\Model;

class tipo_de_entrada extends Model
{

    private $Id_tipoEnt;
    private $Nombre;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarTipoEnt()
    {
        $sql = "SELECT * FROM tipo_de_entrada";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

    public function crearTipoEnt()
    {
        $sql = "INSERT INTO tipo_de_entrada (Nombre) VALUES (?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        return $query->execute();
    }


    public function editarTipoEnt()
    {
        $sql = "UPDATE tipo_de_entrada SET Nombre = ? WHERE Id_tipoEnt = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        $query->bindParam(2,$this->Id_tipoEnt);
        return $query->execute();
    }

    public function eliminarTipoEnt()
    {
        $sql = "DELETE FROM tipo_de_entrada WHERE Id_tipoEnt = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Id_tipoEnt);
        return $query->execute();

    }
}