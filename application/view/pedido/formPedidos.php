<div class="content-wrapper">
  <center><h3 class="box-title">Registrar Pedido</h3></center>
<section class="content">
<div class="row">

<div class="col-md-12">
  <div class="box box-info">

          <form enctype="multipart/form-data" autocomplete="off" id="datosPedido">
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->


                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="idClient" >Cédula del cliente: *</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Haz clic en la lupa para buscar"
                            name="idClient" id="idClient" readonly="readonly" maxlength="10">

                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat" onclick="modalCli()"><i class="fa fa-search"></i></button>
                            </span>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nomCliente">Nombre del cliente</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control"
                        name="nomCliente" id="nomCliente">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="idEmployee" >Cédula del empleado: *</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Haz clic en la lupa para buscar"
                            name="idEmployee" id="idEmployee" readonly="readonly" maxlength="10">

                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat" onclick="modalEmp()"><i class="fa fa-search"></i></button>
                            </span>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nomEmployee">Nombre del empleado</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control"
                        name="nomEmployee" id="nomEmployee" disabled>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="direcCliente">Estado: *</label>

                    <div class="input-group"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <select id="selectEstado" name="selectEstado" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">

                        </select>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                  <label>Fecha de Entrega: *</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="datepicker" id="datepicker" readonly="readonly">
                  </div>
                </div> <!--Cierre del Div contenedor-->

                <h4><b>Total Pedido: $<b class="totalPedido">0</b></b></h4>
                <input type="text" class="totalPedido hidden" name="totalPedido">

            </form>

              <div class="col-md-12">

              </div>
    </div>
  </div> <!--Cierre del Div contenedor-->
</div>

  <div class="col-md-12">
    <div class="box box-body">
      <div class="form-group"> <!--Comienzo del div contenedor del input-->
          <div class="col-md-offset-5"><h4>Seleccione un producto</h4></div>

          <div class="table-responsive"> <!--comienzo div del inputt-->

                <table class="table table-striped table-bordered" id="listProducts" style="width:100%">
                    <thead>
                    <tr>
                      <th>Referencia</th>
                      <th>Producto</th>
                      <th>Marca</th>
                      <th>Categoria</th>
                      <th>Cantidad <br> disponible</th>
                      <th>Precio</th>
                      <th>Ingrese cantidad</th>
                      <th>Opción</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listProdPed as $list):
                        $refer = $list['referencia'];
                        $nomProd = $list['nombreProducto'];
                        $marcaProd= $list['marca'];
                        $CateProd = $list['nombreCate'];
                        $cantProd = $list['cantidad'];
                        $precioProd = $list['precioUnit'];
                      ?>
                        <tr>
                          <td><?php echo $refer ?></td>
                          <td><?php echo $nomProd ?></td>
                          <td><?php echo $marcaProd ?></td>
                          <td><?php echo $CateProd ?></td>
                          <td id="cantActual<?php echo $refer ?>"><?php echo $cantProd ?></td>
                          <td><?php echo $precioProd ?></td>
                          <td> <input type="text" name="cantProdInput"  id ="cantInp<?php echo $refer; ?>" placeholder="Digite una cantidad" maxlength="3"> </td>
                          <td>
                            <button type="button" class="btn btn-primary"
                            onclick="selectProd('<?php echo $refer; ?>', '<?php echo $nomProd; ?>', '<?php echo $precioProd; ?>')">Seleccionar</button>
                         </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

          </div>
      </div>
    </div>
  </div>

        <form enctype="multipart/form-data" autocomplete="off" id="datosDetallePedido">
          <div class="col-md-12">
            <div class="box table-responsive">
              <table class="table table-striped table-bordered" style="width:100%" id="addProducts">
                  <thead>
                  <tr>
                    <th>Referencia</th>
                    <th>Producto</th>
                    <th>Cantidad solicitada</th>
                    <th>Precio unitario</th>
                    <th> Precio total</th>
                    <th>Opción</th>
                  </tr>
                  </thead>
                  <tbody id="listDetalle">
                  </tbody>
                </table>

                <div class="container">
                  <h4><b>Total Pedido: $<b class="totalPedido">0</b></b></h4>
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
</div> <!--cierre div col-md-12-->




</div> <!--cierre div row-->
          </section>
          </div>

<!-- Ventan modal para la actualización de la imagen de perfil-->

<div class="modal fade" id="modalSelectClient" role="dialog"> <!--Div que contiene la ventana modal-->
  <div class="modal-dialog modal-sm">

    <section class="content modal-content" style="border-radius: 10px;">
      <div class="box box-info">
        <div class="box-header modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="box-title">Buscar Cliente</h3>
        </div>
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->
              <!-- /.box-header -->
              <div class="form-group id_label_single">

                  <label form="">Lista de Clientes</label>
                  <select id="clientSelect" class="form-control js-example-basic-single"
                    name="clientSelect" style="width: 100%">

                  </select>

              </div>

              <!-- /.box-body -->
            </div>
      </div>
            <!-- /.box -->

      <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-info pull-right" onclick="agregar()">Agregar</button>
      </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
  </div>

    </section>

</div>

<div class="modal fade" id="modalSelectEmp" role="dialog"> <!--Div que contiene la ventana modal-->
  <div class="modal-dialog modal-sm">

    <section class="content modal-content" style="border-radius: 10px;">
      <div class="box box-info">
        <div class="box-header modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="box-title">Buscar Empleado</h3>
        </div>
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->
              <!-- /.box-header -->
              <div class="form-group id_label_single">

                  <label form="">Lista de Empleados</label>
                  <select id="empSelect" class="form-control js-example-basic-single"
                    name="empSelect" style="width: 100%">

                  </select>

              </div>

              <!-- /.box-body -->
            </div>
      </div>
            <!-- /.box -->

      <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-info pull-right" onclick="agregarEmp()">Agregar</button>
      </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
  </div>

    </section>

</div>
</div>

<script>
function registrar(){
  var patronNum = /[0-9]/;
  var patronLetrEspecial = /\D/;
  var patronSoloLetr = /[^A-Za-z ]/;
  var patronCorreo = /\w+@\w+\.+[a-z]/;

  var id_cliente = $('#idClient').val();
  var id_empleado = $('#idEmployee').val();
  var selectEstado = $('#selectEstado').val();
  var datePedido = $('#datepicker').val();
  var id_productos = $('.idProd').attr('name');
  var cantProducts = $('.cantProd').attr('name');
  var precioProducts = $('.precUnit').attr('name');
  var precioTotalProducts = $('.totPrec').attr('name');
  var totalPedido =$('.totalPedido').text();

  if (selectEstado == 0) { //Valida si los campos estan vacios
    swal("Upss", "No has Seleccionado un Estado al pedido!", "error");

  } else if ((id_cliente=='') || (id_empleado=='')) {
    swal("Upss", "No has Seleccionado a un cliente y/o empleado!", "error");
  } else if (datePedido=='') {
    swal("Upss", "No has Seleccionado una fecha de entrega al pedido!", "error");
  } else if (id_productos === undefined || id_productos.length == 0) {
     swal("Upss", "No has asignado productos al pedido!", "error");
  } else{
    swal({
      title: "Espere un momento por favor",
      text: "El pedido se está procesando",
      icon: Url+'img/gif/Loading_icon.gif',
      imageClass: "contact-form-image",
      buttons: false,
    });
    var datesPed = new FormData($('#datosPedido')[0]);
  $.ajax({
      url: Url+'/pedido/savePedido',
      type:'POST',
      data: datesPed,
      contentType: false,
      processData: false,
    }).done(function(data){

      if (data=='pedidoCreado') {
        var datesDetalle = new FormData($('#datosDetallePedido')[0]);
        $.ajax({
            url: Url+'/detalle_pedido/saveDetallePedido',
            type:'POST',
            data: datesDetalle,
            contentType: false,
            processData: false,
          }).done(function(data){
            if (data>=1) {
              var idtypeSali = 1;
              $.ajax({
                  url: Url+'/salida/saveSalida',
                  type:'POST',
                  data: {
                    idtypeSali: idtypeSali
                  },
                }).done(function(data){
                  if (data == 'salidaCreada') {
                    $.ajax({
                        url: Url+'/detalle_salida/saveDetalleSalida',
                        type:'POST',
                        data: datesDetalle,
                        contentType: false,
                        processData: false,
                      }).done(function(data){
                        if (data >= 1) {
                          $.ajax({
                              url: Url+'/producto/updateCantProdRest',
                              type:'POST',
                              data: datesDetalle,
                              contentType: false,
                              processData: false,
                            }).done(function(data){
                              if (data >= 1) {
                                swal("Increible!", "El pedido ha sido guardado!", "success");
                                $('#listDetalle').empty();
                                $('#idClient').val('');
                                $('#idEmployee').val('');
                                $('#selectEstado').val('');
                                $('#datepicker').val('');
                                $('.totalPedido').val('0');
                                $('.totalPedido').text('0');
                                //tabla.ajax.reload(null,false);
                              }

                            })
                        }

                      })
                  }

                })
            }

          })
      }
      if (data=='errorCrearPedido') {
        swal("Algo salió mal", "El pedido no se logro crear el pedido", "error");
      }

      })
  }

}

//desactivar inputs
$(function(){
  //document.getElementById("idClient").disabled = true;
  //document.getElementById("idEmployee").disabled = true;
  document.getElementById("nomCliente").disabled = true;
  document.getElementById("nomEmployee").disabled = true;
  $('#cantidadProduct').attr('maxlength','3');
  listSelectClient();
  ListEstados();
  listSelectEmp();
})

//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yy',
      startDate: 'd',
      clearBtn: true
    })

//listas
//listar select Clientes

function listSelectClient() {
  $.ajax({
     url:Url+'/pedido/ListClients',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelect = '';
     data.forEach(function(c){
      valueSelect+='<option value='+c.id_cliente+'>'+c.id_cliente+'--'+c.nombreCliente+' '+c.apellidoCliente+'</option>';
     })
     $('#clientSelect').empty();
     $('#clientSelect').html('<option value="" selected="selected">Seleccionar</option>');
     $('#clientSelect').append(valueSelect);
 })
}

//listar select Empleado

function listSelectEmp() {
  $.ajax({
     url:Url+'/pedido/ListEmployees',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelect = '';
     data.forEach(function(e){
      valueSelect+='<option value='+e.idEmpleado+'>'+e.idEmpleado+'--'+e.nombre+' '+e.apellido+'</option>';
     })
     $('#empSelect').empty();
     $('#empSelect').html('<option value="" selected="selected">Seleccionar</option>');
     $('#empSelect').append(valueSelect);
 })
}
//listar estados pedido
function ListEstados() {
  $.ajax({
     url:Url+'/pedido/ListEstados',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelect = '';
     data.forEach(function(est){
      valueSelect+='<option value='+est.idEstadoPedido+'>'+est.Nombre+'</option>';
     })
     $('#selectEstado').empty();
     $('#selectEstado').html('<option value="0" selected="selected">Seleccione un estado al pedido</option>');
     $('#selectEstado').append(valueSelect);
 })
}

function agregar() {
  var patronLetrEspecial = /\D/;
  var Max_Length = 3;

  var clientText = $("#clientSelect option:selected").text();
  var clientVal = $("#clientSelect").val();
  var changeText = clientText.replace(/[^a-z\s]/gi, '');

  $("#idClient").val(clientVal);
  $("#nomCliente").val(changeText);
  $("#modalSelectClient").modal("hide");
  listSelectClient();
}

function agregarEmp() {
  var patronLetrEspecial = /\D/;
  var Max_Length = 3;

  var empText = $("#empSelect option:selected").text();
  var empVal = $("#empSelect").val();
  var changeText = empText.replace(/[^a-z\s]/gi, '');

  $("#idEmployee").val(empVal);
  $("#nomEmployee").val(changeText);
  $("#modalSelectEmp").modal("hide");
  listSelectClient();
}

// funciones modales

function modalCli(){
  $("#modalSelectClient").modal("show");
}

function modalEmp(){
  $("#modalSelectEmp").modal("show");
}

$(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        tabla =	$('#listProducts').DataTable( {

        "lengthMenu": [[4, 8, 15, 50, -1], [4, 8, 15, 50, "Todo"]],
        "scrollX": false,
        // "dom": 'lrtipB',
        responsive: true,
        "language": {
            "url": Url+"/js/lenguaje.json"
        },

        } );

});

function selectProd(refer,nomProd,precioProd) {
  let cantidadProd = $('#cantInp'+refer+'').val();
  var totalPrecio = cantidadProd*precioProd;
  var tdReferExist = $('#idReferTd'+refer+'').text();
  var tdCantActual = parseInt($('#cantActual'+refer+'').text());



  if ((isNaN(cantidadProd))) {
    swal("Upss","Solo se permite ingresar números", "error");
  } else if (cantidadProd > tdCantActual) {
    swal("Upss","No se permite ingresar cantidades mayores al actual", "error");
  } else if (cantidadProd <= 0) {
    swal("Upss","No se permite ingresar cantidades menores o iguales a cero '0' ", "error");
  } else {
    if (tdReferExist == refer) {
      var cantSeleccionada = $('#cantSele'+refer+'').text();
      var totalprice = $('#totalPre'+refer+'').text();
      var sumcant = (parseInt(cantSeleccionada) + parseInt(cantidadProd));
      var restcant = (parseInt(tdCantActual) - parseInt(cantidadProd));
      var sumtotal = (parseInt(totalPrecio) + parseInt(totalprice));

      $('#cantActual'+refer+'').text(restcant);
      $('#cantSele'+refer+'').text(sumcant);
      $('#totalPre'+refer+'').text(sumtotal);
      $('#cantProdSele'+refer+'').val(sumcant);
      $('#totPrecInp'+refer+'').val(sumtotal);
      sumTotales();

    } else {
      $('#addProducts').append(
        "<tr id='tr"+refer+"'>"+
        "<input type='hidden' name='idProd[]' value='"+refer+"' class='idProd'><input type='hidden' name='cantProd[]' value='"+cantidadProd+"' id='cantProdSele"+refer+"'>"+
        "<input type='hidden' name='precUnit[]' value='"+precioProd+"' class='precUnit'><input type='hidden' name='totPrec[]' class='totPrec' value='"+totalPrecio+"' id='totPrecInp"+refer+"'>"+
        "<td id='idReferTd"+refer+"'>"+refer+"</td><td>"+nomProd+"</td><td id='cantSele"+refer+"'>"+cantidadProd+
        "</td><td>"+precioProd+"</td><td id='totalPre"+refer+"'>"+totalPrecio+
        "</td><td><button class='btn btn-danger' type='button' onclick='removetr("+'"'+refer+'"'+")'>Eliminar</button></td></tr>"
      );
      var restcant = (parseInt(tdCantActual) - parseInt(cantidadProd));
      $('#cantActual'+refer+'').text(restcant);
    }
  }

  $('#cantInp'+refer+'').val('');
  sumTotales();
}

function removetr(idP) {
  var cantActSoli = parseInt($('#cantSele'+idP+'').text());
  var cantActTable = parseInt($('#cantActual'+idP+'').text());

  var sumcant = (parseInt(cantActSoli) + parseInt(cantActTable));

  $('#cantActual'+idP+'').text(sumcant)
  $('#tr'+idP+'').remove();
  sumTotales();
}

function sumTotales() {
  $('.totalPedido').val('');
  $('.totalPedido').text('');
  var suma = 0;
  $('.totPrec').each(function(){
    if (isNaN(parseFloat($(this).val()))) {

      suma += 0;

    } else {

      suma += parseFloat($(this).val());

    }
  });
  $('.totalPedido').text(suma);
  $('.totalPedido').val(suma);
}

//plugin slect2
$(document).ready(function() {
    $('.js-example-basic-single').select2({
      theme: "classic"
    });
});
</script>
