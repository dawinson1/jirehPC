<?php
namespace Mini\Model;

use Mini\Core\Model;

class editPerfil extends Model
{

    private $idRol;
    private $Nombre;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function srchdemp($idemp)
    {
        $sql = "SELECT nombre, apellido, telefono, correo, Url_imgEmpleado, id_rol FROM empleado
        WHERE idEmpleado = $idemp";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function srchdcli($idcli)
    {
        $sql = "SELECT nombreCliente, apellidoCliente, telefono, correoCliente, direccionCliente, Url_imgClient, rolCliente FROM cliente
        WHERE id_cliente = $idcli";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

} ?>
