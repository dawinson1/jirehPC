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
    public function formPedidos()
    {
        $listProdPed = $this->listProd();
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/formPedidos.php';
        require APP . 'view/_templates/footer.php';
    }

    public function saveEntrada()
    {
      $this->entrada->set('id_empleado',$_POST['idClient']);
      $this->entrada->set('fechaEntrada',$_POST['datepicker']);
      $this->entrada->set('idTipo_Entrada',$_POST['idEmployee']);
      echo $this->entrada->crearEntrada();
    }
}
