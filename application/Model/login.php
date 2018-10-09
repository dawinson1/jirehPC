<?php
namespace Mini\Model;

use Mini\Core\Model;

class login extends Model
{
    //variables tabla cliente
    private $id_cliente;
    private $contrasena;
    //variables tabla empleado
    private $idEmpleado;
    private $pass;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function buscarDatosLog($pass)
    {

      $sql = "SELECT * FROM cliente WHERE id_cliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->id_cliente);
      $query->execute();
      $result = $query->fetch();

      $sql2 = "SELECT e.*,r.Nombre as nombrerol FROM empleado e INNER JOIN rol r ON r.idRol = e.id_rol WHERE e.idEmpleado = ?";
      $query = $this->db->prepare($sql2);
      $query->bindParam(1,$this->idEmpleado);
      $query->execute();
      $result2 = $query->fetch();

      $password = $pass;

      if ($result) {
        if (password_verify($password,$result["contrasena"])) {

            $_SESSION['loggedin']=true;
            $_SESSION['username']=$result["nombreCliente"];
            $_SESSION['imgPerfil']=$result["Url_imgClient"];
            $_SESSION['Rol']=$result["rolCliente"];

            echo '1';
        }else {
            echo '2';
        }
      } else {
        $password = $pass;
        if (password_verify($password,$result2["pass"])) {

            $_SESSION['loggedin']=true;
            $_SESSION['username']=$result2["nombre"];
            $_SESSION['imgPerfil']=$result2["Url_imgEmpleado"];
            $_SESSION['Rol']=$result2["nombrerol"];

            echo '1';
        }else {
            echo '2';
        }
      }
    }
}
