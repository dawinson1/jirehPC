<div class="content-wrapper">
  <div class="text-center">
    <h3 class="box-title">Catálogo</h3>
  </div>

<?php
$limit = 8;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$productosPag = $this->producto->pagProducts($limit, $start_from);
?>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <?php foreach ($productosPag as $producto) { ?>

      <!--Render de datos-->
        <div class="col-md-3">
            <div class="box box-primary">
              <div class="box-body">
              <div class="list-group" style="height: 10em;width: 15em;" >
                <img src="<?php echo URL.$producto['Url_imgProduct'];?>" style="height: 100%;width: 100%;">
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
