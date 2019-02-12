<div class="content-wrapper">
  <div class="text-center">
    <h2 class="box-title">Catálogo</h2>
  </div>

<?php
$limit = 8;
if (isset($_GET["page"])) {
  $page  = $_GET["page"];
} else {
   $page=1;
 };
$start_from = ($page-1) * $limit;

$productosPag = $this->producto->pagProducts($limit, $start_from);
?>
<section class="content">

<div class="row">
  <div class="col-xs-12">

    <div class="text-center">
      <h4 class="box-title">Buscar por:</h4>
    </div>

    <div class="row">

      <div class="col-xs-12">

        <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
            <label for="selectCat">Categoria</label>

            <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                <select id="selectCat" class="form-control" name="selectCat"></select>
            </div><!--cierre div del inputt-->
        </div> <!--cierre del div contenedor del input-->

        <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
            <label for="nMarc">Marca</label>

            <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                <select id="nMarc" class="form-control" name="nMarc"></select>
            </div><!--cierre div del inputt-->
        </div> <!--cierre del div contenedor del input-->

      </div>

    </div>
  </div>

</div>

<div class="row">
  <div class="col-xs-12">
    <div class="form-group col-md-12 text-center">
      <button id="singlebutton" name="singlebutton" class="btn btn-primary">Buscar&nbsp; <i class="fa fa-search"></i></button>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-xs-12">
    <?php foreach ($productosPag as $producto) { ?>

      <!--Render de datos-->
        <div class="col-md-3">
            <div class="box box-primary">
              <div class="box-body">
              <div class="list-group thumbnail">
                <img src="<?php echo URL.$producto['Url_imgProduct'];?>" style="width: 250px; height:200px;">
              </div>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Nombre:</b> <p class="pull-right"><?php echo $producto['nombreProducto'];?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Referencia:</b> <p class="pull-right"><?php echo $producto['referencia'];?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Marca:</b> <p class="pull-right"><?php echo $producto['marca'];?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Cantidad disponible:</b> <p class="pull-right"><?php echo $producto['cantidad'];?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Precio:</b> <p class="pull-right">$<?php echo $producto['precioUnit'];?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
  <?php } ?>
  </div>
</div>
<div class="container">
    <?php
    echo "<nav><ul class='pagination' id='pagination'>";
    for ($i=1; $i<=$cantidadRegistros; $i++) {
      echo "<li><a href='?page=".$i."'>".$i."</a></li>";
    };
      echo "</ul></nav>";
    ?>
</div>
</section>

</div>

<script>
$(document).ready(function(){
$('#pagination').pagination({
        items: <?php echo $cantidadRegistros;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : '?page='
    });
	});
</script>
