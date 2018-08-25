<?php
namespace Mini\Model;

use Mini\Core\Model;

class login extends Model
{

    private $id_cliente;
    private $contrasena;
    private $datos;

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
        //var_dump($result);

        $password = $pass;
        //var_dump($password);

        //if ($result->rowCount()>0) {

            if (password_verify($password,$result["contrasena"])) {
                
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$result["nombreCliente"];
                $_SESSION['start']=time();
                $_SESSION['expire']=$_SESSION['start']+(5*60);
                echo '1';
    
            }else {
                echo '2';
            }
       // }
    }
       


}