<?php
namespace Mini\Controller;
use Mini\Model\salida;
class salidaController
{
    private $salida;
    function __construct(){
        $this->salida = new salida();
    }
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/existencias/consultSalidas.php';
        require APP . 'view/_templates/footer.php';
    }

    public function saveSalida()
    {
      $dateSali = date("Y-m-d");
      $idEmpSali = $_SESSION['IdEmp'];

      $this->salida->set('id_empleado', $idEmpSali);
      $this->salida->set('fechaSalida', $dateSali);
      $this->salida->set('idTipo_Salida',$_POST['idtypeSali']);
      echo $this->salida->crearSalida();
    }
}
