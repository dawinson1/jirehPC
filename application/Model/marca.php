<?php
namespace Mini\Model;

use Mini\Core\Model;

class marca extends Model
{

    private $idmarca;
    private $Nombre;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarMarca()
    {
        $sql = "SELECT * FROM marca";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

    public function crearMarca()
    {
        $sql = "INSERT INTO marca (Nombre) VALUES (?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        return $query->execute();
    }


    public function editarMarca()
    {
        $sql = "UPDATE marca SET Nombre = ? WHERE idmarca = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->Nombre);
        $query->bindParam(2,$this->idmarca);
        return $query->execute();
    }

    public function eliminarMarca()
    {
        $sql = "DELETE FROM marca WHERE idmarca = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->idmarca);
        return $query->execute();

    }
}