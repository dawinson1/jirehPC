<div class="content-wrapper">
  <div class="text-center"><h3 class="box-title">Registrar un nuevo Producto y/o Entrada</h3></div>
<section class="content">
<div class="row">

<div class="col-md-12">
  <div class="box box-info">
    <div class="text-center">
      <h4>Seleccione un formulario para: </h4>
    </div>
    <div class="box-body">
      <select id="tipoForm" class="form-control" name="tipoForm" onchange="showForm()">
        <option value="0" selected="selected">Seleccionar</option>
        <option value="1">Producto no Existente</option>
        <option value="2">Producto Existente</option>
      </select>

      </select>
    </div>
  </div>
</div>

<div class="col-md-12" id="form1Productos"> <!--Aquí va el formulario para los productos existentes-->

</div>

<div class="col-md-12" id="form2Products"> <!--Aquí va el formulario para los productos no existentes-->

</div>

<form enctype="multipart/form-data" autocomplete="off" id="datosRegistroProdNotExist">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <b class="box-title">Productos No Existentes </b>
      </div>
      <div class="box-body table-responsive">
        <table class="table table-striped table-bordered" style="width:100%" id="ProductsNotExist">
          <caption id="inputsProdNoExist"></caption>
            <thead>
            <tr>
              <th>Referencia</th>
              <th>Producto</th>
              <th>Categoria</th>
              <th>Cantidad</th>
              <th>Stock</th>
              <th>Precio Unitario</th>
              <th>Marca</th>
              <th>Imagen</th>
              <th>Opción</th>
            </tr>
            </thead>
          </table>
      </div>
    </div>

  </div>
</form>

<form enctype="multipart/form-data" autocomplete="off" id="datosRegistroProdExist">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <b class="box-title">Productos Existentes </b>
      </div>
      <div class="box-body table-responsive">
        <table class="table table-striped table-bordered" style="width:100%" id="ProductsExist">
          <caption id="inputsProdExist"></caption>
            <thead>
            <tr>
              <th>Referencia</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Opción</th>
            </tr>
            </thead>
          </table>
      </div>
    </div>

  </div>
</form>


<div class="col-md-12">

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="registrar()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->

</div> <!--cierre div col-md-6-->

</div> <!--cierre div row-->
          </section>
          </div>

<!--AJAX-->
<script>
function agregarProduct(){

  var datosimgProd = new FormData($('#formProduct')[0]);

  var patronNum = /[0-9]/;
  var patronLetrEspecial = /\D/;
  var patronSoloLetr = /[^A-Za-z ]/;
  var AlfaNum = /^[A-Za-z0-9]/;
  var Max_LengthReferencia = 29;
  var Max_LengthNombre = 24;
  var Max_LengthCantidad = 11;
  var Max_LengthMarca = 20;


  var referencia = $('#identificador').val();
  var Max_referencia = $('#identificador').val().length;
  var id_categoria = $('#selectCat').val();
  var Nomcategoria = $('#selectCat option:selected').text();
  var nombreProducto = $('#prodNom').val();
  var Max_nombreProducto = $('#prodNom').val().length;
  var cantidad = $('#cantPro').val();
  var Max_Cantidad = $('#cantPro').val().length;
  var stock = $('#stockPro').val();
  var Max_Stock = $('#stockPro').val().length;
  var precioUnit = $('#preUni').val();
  var Max_PrecioU = $('#preUni').val().length;
  var marca = $('#nMarc').val();
  var Max_Marca = $('#nMarc').val().length;
  var Url_imgProduct =  $('#imgProdu').val();

    if ((referencia == "") || (id_categoria == "") || (nombreProducto == "") || (cantidad == "") || (stock == "") || (precioUnit == "") || (marca == "") || (Url_imgProduct == "")) {
        swal("Upss!", "Los campos no pueden ir vacíos!", "error");
    } else if (patronLetrEspecial.test(cantidad)) {
        swal("Upss!", "En el campo Cantidad solo deben ir números!", "error");
    } else if (patronLetrEspecial.test(stock)) {
        swal("Upss!", "En el campo Stock solo deben ir números!", "error");
    } else if (patronLetrEspecial.test(precioUnit)) {
        swal("Upss!", "En el campo Precio Unitario solo deben ir números!", "error");
    } else if (patronNum.test(marca)) {
        swal("Upss!", "En el campo Marca solo deben ir Letras!", "error");
    } else if ((Max_referencia > Max_LengthReferencia) ||(Max_nombreProducto > Max_LengthNombre) || (Max_Cantidad > Max_LengthCantidad) || (Max_Stock > Max_LengthCantidad) || (Max_PrecioU > Max_LengthCantidad) || (Max_Marca > Max_LengthMarca)) {
        swal("Upss!", "Ingresaste una longitud no válida en un campo!", "error");
    } else {
      $.ajax({
          url: Url+'/producto/buscarProducto',
          type:'POST',
          data: {
            identificador : referencia
          },
      }).done(function(data){
        if (data == 'ProductNotExist') {
          var img = datosimgProd.get('imgProdu');
          var imgName = datosimgProd.get('imgProdu')['name'];

        $('#inputsProdNoExist').append(
          "<div class='hidden' id='tr"+referencia+"2'>"+
          "<input type='hidden' name='identificador[]' value='"+referencia+"'><input type='hidden' name='selectCat[]' value='"+id_categoria+"'>"+
          "<input type='hidden' name='prodNom[]' value='"+nombreProducto+"'><input type='hidden' name='cantPro[]' value='"+cantidad+"'>"+
          "<input type='hidden' name='stockPro[]' value='"+stock+"'><input type='hidden' name='preUni[]' value='"+precioUnit+"'>"+
          "<input type='hidden' name='nMarc[]' value='"+marca+"'><input type='hidden' name='imgProdu[]' value='"+img+"'>"+
          "</div>"
        );
          var rowNotExistProd = "<tr id='tr"+referencia+"'>"+
          "<td>"+referencia+"</td><td>"+nombreProducto+"</td><td>"+Nomcategoria+"</td>"+
          "<td>"+cantidad+"</td><td>"+stock+"</td><td>"+precioUnit+"</td>"+
          "<td>"+marca+"</td><td>"+imgName+"</td>"+
          "<td><button class='btn btn-danger' type='button'"+
          "onclick='tabla1.row($("+'"'+"#tr"+referencia+'"'+")).remove().draw(), $("+'"'+"#tr"+referencia+'2"'+").remove()'>Eliminar</button></td></tr>";

        $('#identificador').val('');
        $('#selectCat').val(0);
        $('#prodNom').val('');
        $('#cantPro').val('');
        $('#stockPro').val('');
        $('#preUni').val('');
        $('#nMarc').val('');
        $('#imgProdu').fileinput('clear');
        tablaNot();
        tabla1.rows.add($(rowNotExistProd)).draw();
        }
        if (data == 'ProductExist') {
          $.ajax({
              url: Url+'/producto/productoEncontrado',
              type:'POST',
              dataType:'json',
              data: {
                identificador : referencia
              },
          }).done(function(data2){
            $('#inputsProdExist').append(
              "<div class='hidden' id='tr"+referencia+"2'>"+
              "<input type='hidden' name='identificador2[]' value='"+referencia+"'>"+
              "<input type='hidden' name='cantPro2[]' value='"+cantidad+"'>"+
              "</div>"
            );
            var nomprodexist = '';
            data2.forEach(function(prd){
              nomprodexist = prd.nombreProducto;
            })
              var rowExistProd = "<tr id='tr"+referencia+"'>"+
              "<td>"+referencia+"</td>"+
              "<td>"+nomprodexist+"</td>"+
              "<td>"+cantidad+"</td>"+
              "<td><button class='btn btn-danger' type='button'"+
              "onclick='tabla2.row($("+'"'+"#tr"+referencia+'"'+")).remove().draw(), $("+'"'+"#tr"+referencia+'2"'+").remove()'>Eliminar</button></td></tr>";

              $('#identificador').val('');
              $('#selectCat').val(0);
              $('#prodNom').val('');
              $('#cantPro').val('');
              $('#stockPro').val('');
              $('#preUni').val('');
              $('#nMarc').val('');
              $('#imgProdu').fileinput('clear');
              tablaYes();
              tabla2.rows.add($(rowExistProd)).draw();
          })

        }
      })
    }
}

function agregarProduct2() {
  var NomProd = $('#selectProduct2').val();
  var referencia2 = $('#selectProduct2 option:selected').text();
  var cant2 = $('#cantPro2').val();

  if ((cant2 == '')) {
    swal("Upss", "El campo cantidad no puede ir vacío", "error");
  } else {
    $.ajax({
      url: Url+'/producto/buscarProducto',
      type:'POST',
      data: {
      identificador: referencia2
    },
    }).done(function(data){
      if (data== 'ProductExist') {
        $('#inputsProdExist').append(
          "<div class='hidden' id='tr"+referencia2+"2'>"+
          "<input type='hidden' name='identificador2[]' value='"+referencia2+"'>"+
          "<input type='hidden' name='cantPro2[]' value='"+cant2+"'>"+
          "</div>"
        );
          var rowExistProd = "<tr id='tr"+referencia2+"'>"+
          "<td>"+referencia2+"</td>"+
          "<td>"+NomProd+"</td>"+
          "<td>"+cant2+"</td>"+
          "<td><button class='btn btn-danger' type='button'"+
          "onclick='tabla2.row($("+'"'+"#tr"+referencia2+'"'+")).remove().draw(), $("+'"'+"#tr"+referencia2+'2"'+").remove()'>Eliminar</button></td></tr>";

          $('#cantPro2').val('');
          $('#selectProduct2').val(0);
          $('#NomProducto2').val('');
          tablaYes();
          tabla2.rows.add($(rowExistProd)).draw();
          $('#btnForm2').prop('disabled', true);
      }
      if (data == 'ProductNotExist') {
        swal("Upss", "El producto no existe, usa el otro formulario para registrar el nuevo producto", "error");
      }
    })
  }
}

function registrar() {
  var detaRegisProd = new FormData($('#datosRegistroProdNotExist')[0]);
    console.log(detaRegisProd);
    $.ajax({
      url: Url+'/producto/crearProducto',
      type:'POST',
      //dataType: "json",
      data: detaRegisProd,
      contentType: false,
      processData: false,
    }).done(function(data){

    })
}

function inputFile() {
  $('#imgProdu').fileinput({
    theme: 'fa',
    language: 'es',
    showUpload : false,
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
  });
}

$(function(){
tablaNot();
tablaYes();
})

function notSpace() {
  if (event.keyCode == 32 || event.key.match(/[a-z0-9\s]/i)===null) event.returnValue = false;
}

function listarSelectCat(){
$.ajax({

    url:Url+'/producto/listarCategoria',
    type: 'POST',
    dataType:'json'
}).done(function(data){

    var selectCat = '';
    data.forEach(function(c){

    selectCat+='<option value='+c.id_categoria+'>'+c.Nombre+'</option>';
    })
    $('#selectCat').empty();
    $('#selectCat').html('<option value="0" selected="selected">Seleccione una categoria</option>');
    $('#selectCat').append(selectCat);

  })
}

function tablaNot() {
  $.fn.dataTable.ext.errMode = 'throw';
  tabla1 =	$('#ProductsNotExist').DataTable( {
  "lengthMenu": [[3, 6, 12, 25, -1], [3, 6, 12, 25, "Todo"]],
  "scrollX": false,
  "retrieve": true,
  responsive: true,
  "language": {
      "url": Url+"/js/lenguaje.json"
  },
  });
}

function tablaYes() {
  $.fn.dataTable.ext.errMode = 'throw';
  tabla2 =	$('#ProductsExist').DataTable( {
  "lengthMenu": [[3, 6, 12, 25, -1], [3, 6, 12, 25, "Todo"]],
  "scrollX": false,
  "retrieve": true,
  responsive: true,
  "language": {
      "url": Url+"/js/lenguaje.json"
  },
  });
}

function showForm() {
  var showForm = $('#tipoForm').val();

  if (showForm==0) {
    $('#form2Products').empty();
    $('#form1Productos').empty();
  } else if (showForm==1) {
    $('#form2Products').empty();
    var form1 = `<div class="box box-info">

              <form enctype="multipart/form-data" autocomplete="off" id="formProduct">
              <div class="box-body"> <!--Este Div es contenedor de los imputs-->
                <div class="row"> <!--row para poder mover los inputs text y el input file -->

                <div class="col-md-6">

                  <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                      <label for="identificador" >Referencia</label>

                      <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                          <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                          <input type="text" class="form-control" placeholder="Referencia del Producto"
                              name="identificador" id="identificador" maxlength="29" onKeyPress="notSpace()">

                      </div><!--cierre div del inputt-->
                  </div> <!--cierre del div contenedor del input-->

                  <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                      <label for="selectCat">Categoria</label>

                      <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                          <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                         <select id="selectCat" class="form-control" name="selectCat"></select>

                      </div><!--cierre div del inputt-->
                  </div> <!--cierre del div contenedor del input-->

                  <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                      <label for="prodNom">Nombre</label>

                      <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                          <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                          <input type="text" class="form-control" placeholder="Nombre del Producto"
                          name="prodNom" id="prodNom" maxlength="24">

                      </div><!--cierre div del inputt-->
                  </div> <!--cierre del div contenedor del input-->

                  <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                      <label for="cantPro">Cantidad</label>

                      <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="text" class="form-control" placeholder="Cantidad de Productos"
                           name="cantPro" id="cantPro" maxlength="11">


                      </div><!--cierre div del inputt-->
                  </div> <!--cierre del div contenedor del input-->

                  <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                      <label for="stockPro">Stock</label>

                      <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                          <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                          <input type="text" class="form-control" placeholder="Muestra Cantidad en bodega"
                          name="stockPro" id="stockPro" maxlength="11">

                      </div><!--cierre div del inputt-->
                  </div> <!--cierre del div contenedor del input-->

                  <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                      <label for="preUni">Precio Unitario</label>

                      <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                          <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                          <input type="text" class="form-control" placeholder="Ingrese Precio Unitario del Producto"
                          name="preUni" id="preUni" maxlength="11">

                      </div><!--cierre div del inputt-->
                  </div> <!--cierre del div contenedor del input-->

                  <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                      <label for="nMarc">Marca</label>

                      <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                          <input type="text" class="form-control" placeholder="Ingrese marca del Producto" autocomplete="off"
                          name="nMarc" id="nMarc" maxlength="20">

                      </div><!--cierre div del input-->
                  </div> <!--cierre del div contenedor del input-->

                </div>

                <div class="col-md-6">

                            <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                              <div class="form-group"> <!--Comienzo del div contenedor del input-->
                                  <label for="imgProdu" >Seleccione imagen del Producto</label>

                                  <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->

                                      <input type="file" class="form-control"
                                          name="imgProdu" id="imgProdu">

                                  </div><!--cierre div del inputt-->
                              </div> <!--cierre del div contenedor del input-->


                            </div> <!--Cierre del Div contenedor-->

                </div> <!--cierre div col-md-6-->

                <div class="col-md-12">
                  <button type="button" class="btn btn-info pull-right" onclick="agregarProduct()">Agregar</button>
                </div>

              </div> <!-- cierre del div row para mover los inputs -->
              </div> <!--Cierre del Div contenedor-->
              </form>
              </div>`;
    $('#form1Productos').append(form1);
    listarSelectCat();
    inputFile();
  } else if (showForm==2) {
    $('#form1Productos').empty();
    var form2 = `<div class="box box-info">
      <form enctype="multipart/form-data" autocomplete="off" id="formProduct">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                <div class="form-group id_label_single">
                    <label>Seleccione un Producto</label>

                    <select id="selectProduct2" class="form-control js-example-basic-single"
                      name="selectProduct2" style="width: 100%" onchange="selectProd()">

                    </select>

                </div>
              </div> <!--cierre del div contenedor del input-->
              <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                  <label for="NomProducto2" >Nombre</label>

                  <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control" placeholder="Nombre del Producto"
                          name="NomProducto2" id="NomProducto2" maxlength="29" onKeyPress="notSpace()" readonly="readonly">

                  </div><!--cierre div del inputt-->
              </div> <!--cierre del div contenedor del input-->
            </div>
            <div class="col-md-6">
              <div class="form-group col-md-12"> <!--Comienzo del div contenedor del input-->
                  <label for="cantPro2" >Ingrese la cantidad entrante</label>

                  <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control" placeholder="Cantidad"
                          name="cantPro2" id="cantPro2" maxlength="11" onKeyPress="notSpace()">

                  </div><!--cierre div del inputt-->
              </div> <!--cierre del div contenedor del input-->
            </div>

            <div class="col-md-12">
              <button type="button" id="btnForm2" class="btn btn-info pull-right" onclick="agregarProduct2()">Agregar</button>
            </div>
          </div>

        </div>
      </form>
      </div>`;
    $('#form2Products').append(form2);
    listSelectProducts();
    styleSelect();
  }
}

function listSelectProducts() {
  $.ajax({
     url:Url+'/producto/selectProducts',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelect = '';
     data.forEach(function(p){
      valueSelect+='<option value='+p.nombreProducto+'>'+p.referencia+'</option>';
     })
     $('#selectProduct2').empty();
     $('#selectProduct2').html('<option value="0" selected="selected">Seleccionar</option>');
     $('#selectProduct2').append(valueSelect);
 })
}

function styleSelect() {
  $('.js-example-basic-single').select2({
    theme: "classic"
  });
}

function selectProd() {
  var nomSelect = $('#selectProduct2').val();

  if (nomSelect == 0) {
    swal("Upss", "Debes seleccionar un producto", "error");
    $('#btnForm2').prop('disabled', true);
  } else {
    $('#btnForm2').prop('disabled', false);
    $('#NomProducto2').val(nomSelect);
  }
}
</script>
