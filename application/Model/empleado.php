<?php
namespace Mini\Model;

use Mini\Core\Model;

class empleado extends Model
{

    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;
    private $idEmpleado;
    private $id_rol;
    private $id_estado;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function litarEmpleados()
    {
        $sql = "SELECT * FROM empleado";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function crearEmpleado()
    {
        $sql = "INSERT INTO empleado (nombre, apellido, telefono,correo,idEmpleado,id_rol,id_estado) VALUES (?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->nombre);
        $query->bindParam(2,$this->apellido);
        $query->bindParam(3,$this->telefono);
        $query->bindParam(4,$this->correo);
        $query->bindParam(5,$this->idEmpleado);
        $query->bindParam(6,$this->id_rol);
        $query->bindParam(7,$this->id_estado);
        return $query->execute();
    }


    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);
        $query->execute($parameters);
    }

    public function cambiarEstado()
    {
        $sql = "UPDATE empleado set id_estado=? where idEmpleado=?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_estado);
        $query->bindParam(2,$this->idEmpleado);
        return $query->execute();

    }
}
