<?php
namespace Mini\Model;

use Mini\Core\Model;

class rol extends Model
{

    private $idRol;
    private $Nombre;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listaRol()
    {
        $sql = "SELECT * FROM rol";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

    public function crearRol()
    {
        $sql = "INSERT INTO rol (Nombre) VALUES (?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        return $query->execute();
    }


    public function editarRol()
    {
        $sql = "UPDATE rol SET Nombre = ? WHERE idRol = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        $query->bindParam(2,$this->idRol);
        return $query->execute();
    }

    public function eliminarRol()
    {
        $sql = "DELETE FROM rol WHERE idRol = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->idRol);
        return $query->execute();

    }
} ?>