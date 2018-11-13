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
           $nomCate = $value['id_categoria'];
           $nomPr = $value['nombreProducto'];
           $cant = $value['cantidad'];
           $stck = $value['stock'];
           $price = $value['precioUnit'];
           $brand = $value['marca'];
           $imgP = $value['Url_imgProduct'];
           $datos[] = array(
               'Referencia'=> $value['referencia'],
               'Categoria'=>$value['id_categoria'],
               'Nombre'=>$value['nombreProducto'],
               'Cantidad'=>$value['cantidad'],
               'Stock'=>$value['stock'],
               'Precio Unitario'=>$value['precioUnit'],
               'Marca'=>$value['marca'],
               'Editar'=>['<button type="button" class="btn btn-primary" onclick="editarProducto
               ('."'".$ref."'".','."'".$nomCate."'".','."'".$nomPr."'".','."'".$cant."'".','."'".$stck."'".','."'".$price."'".','."'".$brand."'".',)">Editar</button>'],
               'Imagen'=>$value['Url_imgProduct'],
               'Actualizar Imagen'=>['<button type="button" class="btn btn-primary" onclick="showModalImg('."'".$ref."'".')"><i class="fa fa-file-image-o"></i></button>'],
               'Eliminar'=>['<button type="button" class="btn btn-primary" onclick="eliminarProducto('."'".$ref."'".')">Eliminar</button>']
           );
       }
       echo json_encode($datos);
    }

    public function crearProducto()
    {
    $this->producto->set('referencia',$_POST['identificador']);
    $this->producto->set('id_categoria',$_POST['selectCat']);
    $this->producto->set('nombreProducto',$_POST['prodNom']);
    $this->producto->set('cantidad',$_POST['cantPro']);
    $this->producto->set('stock',$_POST['stockPro']);
    $this->producto->set('precioUnit',$_POST['preUni']);
    $this->producto->set('marca',$_POST['nMarc']);

    $referencia = $_POST['identificador']; // esta variable sirve para guardar la imagen en una carpeta con su  id
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
                echo $this->producto->crearProducto();


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

    public function eliminarProducto()
    {
      $id = $_POST['identificador'];
      $carpeta = ('img/producto/'.$id);


    		foreach(glob($carpeta . "/*") as $archivos_carpeta)
    		{
    			if (is_dir($archivos_carpeta))
    			{
    				eliminarDir($archivos_carpeta);
    			}
    			else
    			{
    				unlink($archivos_carpeta);
    			}
    		}
    		rmdir($carpeta);


        $this->producto->set('referencia',$_POST['identificador']);
        echo $this->producto->eliminarProducto();
    }



    public function listarCategoria()
    {
      $categoria = $this->producto->listarCategoria();
      echo json_encode($categoria);

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
