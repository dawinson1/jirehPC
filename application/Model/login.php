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

    public function inicioSesion()
    {

        /*foreach ($datos as $dato) {
           $username = $username;
           $password = $password;*/

           $sql = "SELECT * FROM cliente WHERE id_cliente = ?";
           $query = $this->db->prepare($sql);
           $query->bindParam(1,$this->id_cliente);
           $query->execute();
           return $query->fetchAll();
   
           /*if ($query->rowCount()>0) {
               //$query->fetch(PDO::FETCH_ASSOC);
               
               if (password_verify($password,$query["contrasena"])) {
                session_start();
                   $_SESSION['loggedin']=true;
                   $_SESSION['username']=$query["nombreCliente"];
                   $_SESSION['start']=time();
                   $_SESSION['expire']=$_SESSION['start']+(5*60);
       
                   echo '<script>
                           var Url = "<?=URL?>";
                           //window.location="<?php echo URL; ?>cliente";                
                           swal("Bienvenido $_SESSION[username] !", "Has iniciado sesion!", "success");
                         </script>';
               }else {
                   
                   echo '<script>            
                           swal("Upss", "Nombre de usuario o contraseña son incorrectas!", "error");
                         </script>';
               }
           }
        }*/

        

    }

}