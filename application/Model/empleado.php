<?php
namespace Mini\Model;

use Mini\Core\Model;

class empleado extends Model
{

    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;
    private $pass;
    private $idEmpleado;
    private $id_rol;
    private $id_estado;
    private $Url_imgEmpleado;


    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function listarEmpleados()
    {
       // $sql = "SELECT e.nombre, e.apellido, e.telefono, e.correo, e.idEmpleado as Cédula, r.Nombre as Rol,e.id_estado from empleado e INNER JOIN rol r ON (e.id_rol=r.idRol)";
        $sql = "SELECT e.*,r.Nombre as nombrerol, est.nombre as nombreEstadoEmp FROM empleado e
        INNER JOIN rol r ON r.idRol = e.id_rol
        INNER JOIN estados est ON est.id_estado = e.id_estado";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarRoles()
    {
       // $sql = "SELECT e.nombre, e.apellido, e.telefono, e.correo, e.idEmpleado as Cédula, r.Nombre as Rol,e.id_estado from empleado e INNER JOIN rol r ON (e.id_rol=r.idRol)";
        $sql = "SELECT * FROM rol";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function listarEstados()
    {
       // $sql = "SELECT e.nombre, e.apellido, e.telefono, e.correo, e.idEmpleado as Cédula, r.Nombre as Rol,e.id_estado from empleado e INNER JOIN rol r ON (e.id_rol=r.idRol)";
        $sql = "SELECT * FROM estados";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function crearEmpleado()
    {
        $sql = "INSERT INTO empleado (nombre,apellido,telefono,correo,pass,idEmpleado,id_rol,id_estado,Url_imgEmpleado) VALUES (?,?,?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->nombre);
        $query->bindParam(2,$this->apellido);
        $query->bindParam(3,$this->telefono);
        $query->bindParam(4,$this->correo);
        $query->bindParam(5,$this->pass);
        $query->bindParam(6,$this->idEmpleado);
        $query->bindParam(7,$this->id_rol);
        $query->bindParam(8,$this->id_estado);
        $query->bindParam(9,$this->Url_imgEmpleado);
        return $query->execute();
    }

    public function editarImgEmpleado()
    {
      $sql = "UPDATE empleado SET Url_imgEmpleado = ? WHERE idEmpleado = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Url_imgEmpleado);
      $query->bindParam(2,$this->idEmpleado);
      return $query->execute();
    }


    public function editarEmpleado()
    {
        $sql = "UPDATE empleado SET nombre = ?, apellido = ?, telefono = ?,correo = ?, id_rol = ?,id_estado = ? WHERE idEmpleado = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->nombre);
        $query->bindParam(2,$this->apellido);
        $query->bindParam(3,$this->telefono);
        $query->bindParam(4,$this->correo);
        $query->bindParam(5,$this->id_rol);
        $query->bindParam(6,$this->id_estado);
        $query->bindParam(7,$this->idEmpleado);
        return $query->execute();
    }

    public function cambiarEstadoEmp()
    {
        $sql = "UPDATE empleado set id_estado=? where idEmpleado=?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->id_estado);
        $query->bindParam(2,$this->idEmpleado);
        return $query->execute();

    }
}
