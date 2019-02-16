<div class="content-wrapper">
  <div class="text-center">
    <h2 class="box-title">Catálogo</h2>
  </div>

<?php
$limit = 8;

if ((isset($_GET["page"])) | (isset($_GET["mc"])) | (isset($_GET["ct"])) ) {

  $page  = $_GET["page"];
  $mc  = $_GET["mc"];
  $ct = $_GET["ct"];

  if (($mc == 0) & ($ct == 0)) {

    $start_from = ($page-1) * $limit;
    $cantidadRegistros = $this->countCatalogo();
    $productosPag = $this->producto->pagProducts($limit, $start_from);

  } elseif (($mc == 0) & ($ct != 0)) {

    $start_from = ($page-1) * $limit;
    $cantidadRegistros = $this->countCatalogoBYcat($ct);
    $productosPag = $this->producto->pagProductsBYcat($limit, $start_from, $ct);

  } elseif (($mc != 0) & ($ct == 0)) {

    $start_from = ($page-1) * $limit;
    $cantidadRegistros = $this->countCatalogoBYmc($mc);
    $productosPag = $this->producto->pagProductsBYmc($limit, $start_from, $mc);

  } elseif (($mc != 0) & ($ct != 0)) {

    $start_from = ($page-1) * $limit;
    $cantidadRegistros = $this->countCatalogoBYmcycat($mc, $ct);
    $productosPag = $this->producto->pagProductsBYmcycat($limit, $start_from, $mc, $ct);
  }

} else {
   $page=1;
   $mc=0;
   $ct=0;
   $start_from = ($page-1) * $limit;
   $cantidadRegistros = $this->countCatalogo();
   $productosPag = $this->producto->pagProducts($limit, $start_from);
 };

?>
<section class="content">

<div class="row">
  <div class="col-xs-12">

    <div class="text-center">
      <h4 class="box-title">Buscar por:</h4>
    </div>

    <div class="row">

      <div class="col-xs-12">

        <div class="form-group col-md-4"> <!--Comienzo del div contenedor del input-->
            <label for="selectCat">Categoría</label>

            <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                <select id="selectCat" class="form-control" name="selectCat"></select>
            </div><!--cierre div del inputt-->
        </div> <!--cierre del div contenedor del input-->
        <div class="form-group col-md-1">
          <div class="my-colorpicker2 colorpicker-element text-center"> <!--comienzo div del inputt-->
            <br>
              <h4><b>Y/O</b></h4>
          </div><!--cierre div del inputt-->
        </div>
        <div class="form-group col-md-4"> <!--Comienzo del div contenedor del input-->
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
      <button onclick="geturl()" id="singlebutton" name="singlebutton" class="btn btn-primary">Buscar&nbsp; <i class="fa fa-search"></i></button>
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
                    <b>Categoria:</b> <p class="pull-right"><?php echo $producto['categoria'];?></p>
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
      echo "<li><a href='?mc=".$mc."&ct=".$ct."&page=".$i."'>".$i."</a></li>";
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
		hrefTextPrefix : '?mc='+<?php echo $mc;?>+'&ct='+<?php echo $ct;?>+'&page='
    });
	});


$(function(){
listarSelectMarcs();
listarSelectCat();
})

function listarSelectCat() {
  $.ajax({
     url:Url+'/producto/listarCategoria',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var selectCat = '';
     data.forEach(function(c){
        selectCat+='<option value='+c.id_categoria+'>'+c.Nombre+'</option>';
     })
     $('#selectCat').empty();
     $('#selectCat').html('<option value="0" selected="selected">Seleccionar</option>');
     $('#selectCat').append(selectCat);
     $('#selectCat').val(<?php echo $ct ; ?>);
 })
}

function listarSelectMarcs() {
  $.ajax({
     url:Url+'/producto/listarMarca',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var selectMarc = '';
     data.forEach(function(m){
        selectMarc+='<option value='+m.idmarca+'>'+m.Nombre+'</option>';
     })
     $('#nMarc').empty();
     $('#nMarc').html('<option value="0" selected="selected" >Seleccionar</option>');
     $('#nMarc').append(selectMarc);
     $('#nMarc').val(<?php echo $mc ; ?>);
 })
}

function geturl() {
  valmc = $('#nMarc').val();
  valcta = $('#selectCat').val();
  location.href = Url+'producto/catalogo?mc='+valmc+'&ct='+valcta+'&page=1'
}


</script>
