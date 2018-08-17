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

    public function buscarDatosLog()
    {

        /*foreach ($datos as $dato) {
           $username = $username;
           $password = $password;

           $sql = "SELECT * FROM cliente WHERE id_cliente = ?";
           $query = $this->db->prepare($sql);
           $query->bindParam(1,$this->id_cliente);
           $password = $query->bindParam(2,$this->contrasena);
           return $query->execute();
           var_dump($query);*/

           $VAR1 = $this->db->prepare('SELECT * FROM cliente WHERE id_cliente = ?');
           $VAR1->bindParam(1,$this->id_cliente);
           $VAR1->bindParam(2,$this->contrasena);
           $password = $pass;

           if ($VAR1->rowCount()>0) {
               //$query->fetch(PDO::FETCH_ASSOC);
               
               if (password_verify($password,$VAR1["contrasena"])) {
                session_start();
                   $_SESSION['loggedin']=true;
                   $_SESSION['username']=$VAR1["nombreCliente"];
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
        

        

    }

}