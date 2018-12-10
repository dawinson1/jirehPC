<?php
namespace Mini\Model;

use Mini\Core\Model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class login extends Model
{
    //variables tabla cliente
    private $id_cliente;
    private $contrasena;
    private $correoCliente;
    //variables tabla empleado
    private $idEmpleado;
    private $pass;
    private $correo;

    private $Token;
    private $email;

    public function set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function BuscarUser($emailUser)
    {
      $sql = "SELECT c.*, t.email FROM cliente c INNER JOIN tokenscli t ON t.Token = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Token);
      $query->execute();
      $resultado = $query->fetch();

      $sql2 = "SELECT e.*, t.email FROM empleado e INNER JOIN tokensemp t ON t.Token = ?";
      $query = $this->db->prepare($sql2);
      $query->bindParam(1,$this->Token);
      $query->execute();
      $resultado2 = $query->fetch();

      if( $resultado ){
        $usuario = $resultado;
        if( sha1($usuario['correoCliente']) == $emailUser ){
          echo 'datos encontrados';
        } else{
          echo 'email no coincide';
        }
      } elseif ($resultado2) {
        $usuario2 = $resultado2;
        if( sha1($usuario2['correo']) == $emailUser ){
          echo 'datos encontrados';
        } else{
          echo 'email no coincide';
        }
      } else{
        echo 'no encontro datos';
      }
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
            $_SESSION['IdEmp']=$result2["idEmpleado"];
            $_SESSION['imgPerfil']=$result2["Url_imgEmpleado"];
            $_SESSION['Rol']=$result2["nombrerol"];

            echo '1';
        }else {
            echo '2';
        }
      }
    }

    public function buscarCorreo($Correo)
    {
      $sql = "SELECT * FROM cliente WHERE correoCliente = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->correoCliente);
      $query->execute();
      $result = $query->fetch();

      $sql2 = "SELECT * FROM empleado WHERE correo = ?";
      $query = $this->db->prepare($sql2);
      $query->bindParam(1,$this->correo);
      $query->execute();
      $result2 = $query->fetch();

      if ($result) {
        $emailLink = $Correo;

        $linkTemporal = $this->linkTempoCli($emailLink);

        if($linkTemporal){

          $email = $Correo;

          $envio = $this->enviarEmail( $email, $linkTemporal );
          if ($envio) {
            echo 'Correo Enviado';
          }else {
            echo 'Error Envio';
          }
        } else {
          echo 'Error link';
        }
      } elseif ($result2) {
        $emailLink = $Correo;

        $linkTemporal = $this->linkTempoEmp( $emailLink );

        if($linkTemporal){

          $email = $Correo;

          $envio = $this->enviarEmail( $email, $linkTemporal );
          if ($envio) {
            echo 'Correo Enviado';
          }else {
            echo 'Error Envio';
          }
        } else {
          echo 'Error link';
        }
      } else {
        echo 'Correo no existe';
      }
    }

    public function linkTempoCli($emailLink)
    {
      // Se genera una cadena para validar el cambio de contraseña
      $cadena = $emailLink.rand(1,9999999).date('Y-m-d');
      $this->Token = sha1($cadena);
      $this->email = $emailLink;

      $Token = sha1($cadena);
      $email = $emailLink;

      // Se inserta el registro en la tabla tokens
      $sql = "INSERT INTO tokenscli (email,Token) VALUES (?,?)";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->email);
      $query->bindParam(2,$this->Token);
      $resultado = $query->execute();

      if($resultado){
        // Se devuelve el link que se enviara al usuario
        $enlace = URL.'login/restaurar?emailusuario='.sha1($email).'&token='.$Token;
        return $enlace;
      }
      else
        return FALSE;
    }

    public function linkTempoEmp($emailLink)
    {
      // Se genera una cadena para validar el cambio de contraseña
      $cadena = $emailLink.rand(1,9999999).date('Y-m-d');
      $this->Token = sha1($cadena);
      $this->email = $emailLink;

      $Token = sha1($cadena);
      $email = $emailLink;

      // Se inserta el registro en la tabla tokens
      $sql = "INSERT INTO tokensemp (email,Token) VALUES (?,?)";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->email);
      $query->bindParam(2,$this->Token);
      $resultado = $query->execute();

      if($resultado){
        // Se devuelve el link que se enviara al usuario
        $enlace = URL.'login/restaurar?emailusuario='.sha1($email).'&token='.$Token;
        return $enlace;
      }
      else
        return FALSE;
    }

    public function enviarEmail($email, $link)
    {
      $mail = new PHPMailer(true);

      $mensaje = '<html>
        <head>
          <title>Restablece tu contraseña</title>
        </head>
        <body>
          <p>Hemos recibido una petición para restablecer la contraseña de su cuenta.</p>
          <p>Si has hecho la petición, haz clic en el siguiente enlace, de lo contrario puedes ignorar este correo.</p>
          <p>
          <strong>Enlace para restablecer tu contraseña</strong><br>
          <a href="'.$link.'"> Restablecer contraseña </a>
          <p>Si la dirección no funciona, copie y pegue el siguiente enlace en la barra de busqueda de su navegador.</p>
          <p>'.$link.'</p>
          </p>
        </body>
        </html>';

        $cabeceras = 'Jireh PC-Version: 2.4.0' . "\r\n";
        $cabeceras .= 'From: C.G Software' . "\r\n";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com"; // SMTP server
        $mail->Username = "**********";        // SMTP username
        $mail->Password = "**********";               // SMTP password

        $mail->CharSet = 'UTF-8';
        $mail->From = "cgsoftware01@gmail.com";
        $mail->FromName = "Jireh PC";
        $mail->IsHTML(true);
        $mail->AddAddress($email);
        $mail->Subject = "Restablecer contraseña";
        $mail->Body = $mensaje.$cabeceras;
        $mail->WordWrap = 50;
        $return = $mail->Send();


      if(!$return) {
        return false;
        echo 'Error del mensaje: ' . $mail->ErrorInfo;
      } else {
        return true;
      }
    }

    public function restorePass($newPass)
    {
      $sql = "SELECT c.*, t.email AS emailTokCli FROM cliente c INNER JOIN tokenscli t ON t.Token = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$this->Token);
      $query->execute();
      $resultado = $query->fetch();

      $sql2 = "SELECT e.*, t.email AS emailTokEmp FROM empleado e INNER JOIN tokensemp t ON t.Token = ?";
      $query = $this->db->prepare($sql2);
      $query->bindParam(1,$this->Token);
      $query->execute();
      $resultado2 = $query->fetch();

      if ($resultado) {
        $usuario = $resultado;
        if ($usuario['correoCliente']==$usuario['emailTokCli']) {

          $this->contrasena = $newPass;
          $this->correoCliente = $usuario['correoCliente'];

          $sql = "UPDATE cliente SET contrasena = ? WHERE correoCliente = ?";
          $query = $this->db->prepare($sql);
          $query->bindParam(1,$this->contrasena);
          $query->bindParam(2,$this->correoCliente);
          $update = $query->execute();

          if ($update) {

            $this->email = $usuario['emailTokCli'];

            $sql = "DELETE FROM tokenscli WHERE email = ?";
            $query = $this->db->prepare($sql);
            $query->bindParam(1,$this->email);
            $goodUpdate = $query->execute();

            if ($goodUpdate) {
              echo 'Update success';
            } else {
              echo 'Delete Token Error';
            }

          } else {
            echo 'error al actualizar';
          }
        } else {
          echo 'emailError';
        }
      } elseif ($resultado2) {
        $usuario2 = $resultado2;
        if ($usuario2['correo']==$usuario2['emailTokEmp']) {

          $this->pass = $newPass;
          $this->correo = $usuario2['correo'];

          $sql = "UPDATE empleado SET pass = ? WHERE correo = ?";
          $query = $this->db->prepare($sql);
          $query->bindParam(1,$this->pass);
          $query->bindParam(2,$this->correo);
          $update = $query->execute();

          if ($update) {

            $this->email = $usuario2['emailTokEmp'];

            $sql = "DELETE FROM tokensemp WHERE email = ?";
            $query = $this->db->prepare($sql);
            $query->bindParam(1,$this->email);
            $goodUpdate = $query->execute();

            if ($goodUpdate) {
              echo 'Update success';
            } else {
              echo 'Delete Token Error';
            }

          } else {
            echo 'error al actualizar';
          }
        } else {
          echo 'emailError';
        }
      } else {
        echo 'expiration token';
      }
    }
}
