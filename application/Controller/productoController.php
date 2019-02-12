<?php
namespace Mini\Controller;
use Mini\Model\producto;
class productoController
{
    private $producto;
    function __construct(){
        $this->producto = new producto();
    }
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function formProducto()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/formProducto.php';
        require APP . 'view/_templates/footer.php';
    }
    public function editarProducto()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/editarProducto.php';
        require APP . 'view/_templates/footer.php';
    }
    public function catalogo()
    {
        $cantidadRegistros = $this->countCatalogo();
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/catalogo.php';
        require APP . 'view/_templates/footer.php';
    }
    public function listarProducto()
    {
       $producto = $this->producto->listarProductos();
       foreach($producto as $value){
           $ref = $value['referencia'];
           $idCate = $value['id_categoria'];
           $nomCate = $value['nombrecate'];
           $nomPr = $value['nombreProducto'];
           $cant = $value['cantidad'];
           $stck = $value['stock'];
           $price = $value['precioUnit'];
           $idEstado =$value['estadosproduct_idestadosproduct'];
           $nomEstEmp =$value['nombreEstadoPro'];
           $idMarca = $value['marcaID'];
           $brand = $value['marca'];
           $imgP = $value['Url_imgProduct'];
           $datos[] = array(
               'Referencia'=> $value['referencia'],
               'Categoria'=>$value['nombrecate'],
               'Nombre'=>$value['nombreProducto'],
               'Cantidad'=>$value['cantidad'],
               'Stock'=>$value['stock'],
               'Precio Unitario'=>$value['precioUnit'],
               'Marca'=>$value['marca'],
               'EstadoProd'=>$value['nombreEstadoPro'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarProducto
               ('."'".$ref."'".','."'".$idCate."'".','."'".$nomPr."'".','."'".$cant."'".','."'".$stck."'".','."'".$price."'".','."'".$idMarca."'".',)">Editar</button>'],
               'Imagen'=>$value['Url_imgProduct'],
               'Actualizar Imagen'=>['<button type="button" class="btn btn-primary" onclick="showModalImg('."'".$ref."'".')"><i class="fa fa-file-image-o"></i></button>'],
               'Eliminar'=>['<input type="checkbox" onchange="changeStatusProd('."'".$idEstado."'".','."'".$ref."'".')" id="toggleProd_'.$ref.'"
               class="toggle-Producto estProd'.$idEstado.'" data-toggle="toggle" data-offstyle="danger" data-on="Activo" data-off="Inactivo">']
           );
       }
       echo json_encode($datos);
    }

    public function crearProductos()
    {
      foreach ($_POST['identificador'] as $key => $value) {
        $this->producto->set('referencia', $value);
        $this->producto->set('id_categoria', $_POST['selectCat'][$key]);
        $this->producto->set('nombreProducto', $_POST['prodNom'][$key]);
        $this->producto->set('cantidad', $_POST['cantPro'][$key]);
        $this->producto->set('stock', $_POST['stockPro'][$key]);
        $this->producto->set('precioUnit', $_POST['preUni'][$key]);
        $this->producto->set('idMarca', $_POST['nMarc'][$key]);
        $this->producto->set('Url_imgProduct', $_POST['imgProdu'][$key]);
        $this->producto->set('estadosproduct_idestadosproduct', $_POST['estProd'][$key]);
        echo $this->producto->crearProducto();
      }
    }

    public function updateCantProd()
    {
      foreach ($_POST['identificador2'] as $key => $value) {

        $idprod = $value;
        $cantPod = $this->producto->cantProducto($idprod);
        $cantDB = $cantPod['cantidad'];
        $cantProdDB[] = array('cantidadDB' => $cantDB);
        $cantProdForm[] = array('cantidadForm' => $_POST['cantPro2'][$key]);
      }

      for ($i=0; $i < count($cantProdDB); $i++) {
        $sumaCants[$i] = $cantProdDB[$i]['cantidadDB'] + $cantProdForm[$i]['cantidadForm'];
      }

      foreach ($_POST['identificador2'] as $key => $value) {

        $this->producto->set('referencia', $value);
        $this->producto->set('cantidad', $sumaCants[$key]);
        echo $this->producto->updateCantProducto();
      }

    }

    public function updateCantProdRest()
    {
      foreach ($_POST['idProd'] as $key => $value) {

        $idprod = $value;
        $cantPod = $this->producto->cantProducto($idprod);
        $cantDB = $cantPod['cantidad'];
        $cantProdDB[] = array('cantidadDB' => $cantDB);
        $cantProdForm[] = array('cantidadForm' => $_POST['cantProd'][$key]);
      }

      for ($i=0; $i < count($cantProdDB); $i++) {
        $restaCants[$i] = $cantProdDB[$i]['cantidadDB'] - $cantProdForm[$i]['cantidadForm'];
      }

      foreach ($_POST['idProd'] as $key => $value) {

        $this->producto->set('referencia', $value);
        $this->producto->set('cantidad', $restaCants[$key]);
        echo $this->producto->updateCantProducto();
      }

    }

    public function buscarProducto()
    {
      $this->producto->set('referencia',$_POST['identificador']);
      echo $this->producto->buscarProducto();
    }

    public function productoEncontrado()
    {
      $this->producto->set('referencia',$_POST['identificador']);
      $datos = $this->producto->productoEncontrado();
      echo json_encode($datos);
    }

    public function editarProduct()
    {
      $this->producto->set('referencia',$_POST['identificador']);
      $this->producto->set('id_categoria',$_POST['selectCat']);
      $this->producto->set('nombreProducto',$_POST['prodNom']);
      $this->producto->set('cantidad',$_POST['cantPro']);
      $this->producto->set('stock',$_POST['stockPro']);
      $this->producto->set('precioUnit',$_POST['preUni']);
      $this->producto->set('marca',$_POST['nMarc']);
      echo $this->producto->editarProducto();
    }

    public function actImgProducto()
    {
        $this->producto->set('referencia',$_POST['refProdImg']);

        //Declaramos las variables que necesitaremos para la validacion de la imagen
        $referencia = $_POST['refProdImg']; // esta variable sirve para guardar la imagen en una carpeta con su  id
        $imgProducto = $_FILES['imgProdu']; // aqui guardamos el nombre de la imagen

        if ($imgProducto["error"]>0) { // verifica si el Archivo no contenga algun error
          echo "Error Archivo";
        } else { // si el archivo está esta bien procedera a ejecutar la siguientes instrucciones

          $imgPermitidas = array("image/gif", "image/png", "image/jpg", "image/jpeg"); //array que contiene la extension de imagenes permitidas

          if (in_array($imgProducto["type"], $imgPermitidas)) { // validacion si el tipo de imagen es valida

            $ruta = 'img/producto/'.$referencia.'/'; //ruta en donde se guardará la imagen
            $nombreImg = $ruta.$imgProducto["name"]; //nombre de la imagen con la ruta cocatenada

            if (!file_exists($ruta)) { // valida si la carpeta no existá, si es así, la crea
              mkdir($ruta);
            }
            /*
            if (!file_exists($nombreImg)) { //si la imagen no existe, procedera a mover la imagen a la carpeta (opcional)
            */
              $resultado = @move_uploaded_file($imgProducto["tmp_name"], $nombreImg);

              if ($resultado) { //si el resutado es verdadero envio los datos al Modelo

                $this->producto->set('Url_imgProduct',$nombreImg);
                echo $this->producto->editarImgProducto();

              } else { //si llega haber alguna falla a guardar al imagen mostrará este mensaje
                echo "Error al guardar imagen";
              }

            /*} else { //si la imagen existe enviará este mensaje
              echo "La imagen ya existe";
            }*/

          } else { // si no es valida mostrará este echo
            echo "img no permitida";
          }

        } // fin validaciones

    }

    public function cambiarEstadoProd()
    {
      $this->producto->set('referencia',$_POST['idProducto']);
      $this->producto->set('estadosproduct_idestadosproduct',$_POST['idEstEmp']);
      echo $this->producto->cambiarEstadoProd();
    }

    public function listarMarca()
    {
      $marca = $this->producto->listarMarca();
      echo json_encode($marca);
    }

    public function listarCategoria()
    {
      $categoria = $this->producto->listarCategoria();
      echo json_encode($categoria);
    }

    public function selectProducts()
    {
      $selectProducts = $this->producto->selectProducts();
      echo json_encode($selectProducts);
    }

    public function listarCatalogo()
    {
      $catalogo = $this->producto->listarCatalogo();
      echo json_encode($catalogo);
    }

    public function countCatalogo()
    {
      $countCatalogo = $this->producto->countCatalogo();
      return $countCatalogo;
    }

    public function pagProducts($limit, $start_from)
    {
      $productosPag = $this->producto->countCatalogo();
      return $productosPag;
    }
}
