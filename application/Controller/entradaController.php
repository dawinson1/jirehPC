<?php
namespace Mini\Controller;
use Mini\Model\entrada;
class entradaController
{
    private $entrada;
    function __construct(){
        $this->entrada = new entrada();
    }
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function entrada()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/entrada/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function formPedidos()
    {
        $listProdPed = $this->listProd();
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/formPedidos.php';
        require APP . 'view/_templates/footer.php';
    }

    public function saveEntrada()
    {
      $dateEnt = date("Y-m-d");
      $idEmpEnt = $_SESSION['IdEmp'];

      $this->entrada->set('id_empleado', $idEmpEnt);
      $this->entrada->set('fechaEntrada', $dateEnt);
      $this->entrada->set('idTipo_Entrada',$_POST['idtypeEnt']);
      echo $this->entrada->crearEntrada();
    }


    public function listarEntrada(){

        
    }
}
