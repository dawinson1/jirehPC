<div class="content-wrapper">
  <center><h3 class="box-title">Registrar Pedido</h3></center>
<section class="content">
<div class="row">

<div class="col-md-12">
<div class="box box-info">

            <form autocomplete="off">
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->


                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="idClient" >Cédula o NIT del cliente</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese la cédula o el NIT del Cliente"
                            name="idClient" id="idClient">

                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                            </span>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nomCliente">Nombre del cliente</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control"
                        name="nomCliente" id="nomCliente" disabled>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="idEmployee" >Cédula del empleado</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese la cédula o el NIT del Cliente"
                            name="idEmployee" id="idEmployee">

                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
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
                    <label for="direcCliente">Estado</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          <option selected="selected">Elige un estado al pedido</option>
                          <option value="1">Pendiente</option>
                          <option value="2">Finalizado</option>
                        </select>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                  <label>Fecha de Entrega:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                </div> <!--Cierre del Div contenedor-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="refProduct">Agregar producto</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->

                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="srcProduct()"><i class="fa fa-plus"></i></button>
                        </span>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                  <table class="table table-striped table-bordered" style="width:100%">
                      <thead>
                      <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                      </tr>
                      </thead>
                      <tbody id="addProducts">
                      </tbody>
                    </table>
                  </div>
                </div>

            </div> <!--Cierre del Div contenedor-->

            </div>
</div> <!--cierre div col-md-12-->


<div class="col-md-12">

            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="registrar()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->

</div> <!--cierre div col-md-6-->

</div> <!--cierre div row-->
          </section>
          </div>

<!-- Ventan modal para la actualización de la imagen de perfil-->

<div class="modal fade" id="Addproducts" role="dialog"> <!--Div que contiene la ventana modal-->
<div class="modal-dialog modal-sm">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Seleccione un producto</h3>
            </div>
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->
              <!-- /.box-header -->
              <div class="form-group">

                  <label form="">Selecciones un producto</label>
                  <select id="productSelect" class="form-control" name="productSelect">

                  </select>

              </div>

              <div class="form-group">
                  <label for="cantidadProduct" >Cantidad</label>
                      <span></span>
                      <input type="text" class="form-control"
                          name="cantidadProduct" id="cantidadProduct">

              </div> <!--cierre del div contenedor del input-->
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
</div>

<script>
        function registrar(){
        var patronNum = /[0-9]/;
        var patronLetrEspecial = /\D/;
        var patronSoloLetr = /[^A-Za-z ]/;
        var patronCorreo = /\w+@\w+\.+[a-z]/;

        var id_cliente = $('#identificador').val();
        var nombreCliente = $('#nomCliente').val();
        var apellidoCliente = $('#apeCliente').val();
        var correoCliente = $('#correoCliente').val();
        var direccionCliente = $('#direcCliente').val();
        var telefono = $('#telCliente').val();
        var contrasena = $('#passCliente').val();
        var imgClient = $('#imgClient').val();

        if ((id_cliente == "") || (nombreCliente == "") || (apellidoCliente == "") || (correoCliente == "") || (direccionCliente == "") || (imgClient == "") ) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");

        } else if (patronLetrEspecial.test(id_cliente)){
//sintaxis para validar que el campo no contenga números. patron es la experesion regular, dentro del .test() se pone la variable a comparar

            swal("Upss", "No se permite ingresar letras y/o caracteres en el campo Cedula o NIT!", "error");

        }else if (patronSoloLetr.test(nombreCliente)){

              swal("Upss", "No se permite ingresar números y/o caracteres en el campo Nombre!", "error");

        } else if (patronSoloLetr.test(apellidoCliente)){

              swal("Upss", "No se permite ingresar números y/o caracteres en el campo Apellido!", "error");

        } else if (!patronCorreo.test(correoCliente)){

              swal("Upss", "El correo ingresado no es válido!", "error");

        } else if (patronLetrEspecial.test(telefono)){

              swal("Upss", "El teléfono ingresado no es válido!", "error");

        } else{

          var datosimg = new FormData($('#actImgPerfilClient')[0]);
          console.log(datosimg)

              $.ajax({
                  url: Url+'/cliente/actImgCliente',
                  type:'POST',
                  data: datosimg,
                  contentType: false,
                  processData: false,
                }).done(function(data){
                  if (data=='Error Archivo') {
                    swal("Algo anda mal!", "Es posible que la imagen este dañada!", "error");
                  }
                  if (data=='img no permitida') {
                    swal("¿Que haces?", "Este formato no esta permitido!", "error");
                  }
                  if (data=='La imagen ya existe') {
                    swal("Wow", "Esta imagen ya existe! Intenta cambiarle el nombre a tu archivo.", "error");
                  }
                  if (data=='Error al guardar imagen') {
                    swal("Lo sentimos :(", "Hubo un error al guardar la imagen", "error");
                  }
                  if (data==1) {
                    swal("Bien Hecho!", "La tu imagen  ha sido actualizada!", "success");
                    $('#idClientMimg').val('');
                    $('#imgClient').fileinput('clear');
                    $("#myModalFile").modal("hide");
                    tabla.ajax.reload(null,false);
                  }

                  })
        }

    }
//puglin file input
    $('#imgClient').fileinput({
            theme: 'fa',
            language: 'es',
            showUpload : false,
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
        });
//desactivar inputs
$(function(){
  document.getElementById("nomCliente").disabled = true;
  document.getElementById("nomEmployee").disabled = true;
  $('#cantidadProduct').attr('maxlength','3');
  listarSelectProd();
})

//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yy'
    })

//listas
//listarProductos

function listarSelectProd() {
  $.ajax({
     url:Url+'/pedido/ListProducts',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelect = '';
     data.forEach(function(p){
      valueSelect+='<option value='+p.referencia+'>'+p.nombreProducto+'</option>';
     })
     $('#productSelect').empty();
     $('#productSelect').html('<option value="" selected="selected">Seleccionar</option>');
     $('#productSelect').append(valueSelect);
 })
}

function agregar() {
  var patronLetrEspecial = /\D/;
  var Max_Length = 3;

  var Product = $("#productSelect option:selected").text();
  var cantidad = $('#cantidadProduct').val();
  var cantTength = $("#cantidadProduct").val().length;

  if (Product == 'Seleccionar') {
    swal("", "Debes seleccionar un producto", "error");
  }else if (cantidad == '') {
    swal("", "Debes ingresar una cantidad", "error");
  }else if (patronLetrEspecial.test(cantidad)) {
    swal("", "Debes ingresar una cantidad válida", "error");
  }else if (cantTength > Max_Length) {
    swal("Wow", "Has ingresado una longitud no válida, inténtalo de nuevo, por favor no vuelvas a eliminar el atributo maxlength", "error");
  }else {
    var valueTable = '';

    valueTable+='<tr>';
    valueTable+='<td>'+Product+'</td>';
    valueTable+='<td>'+cantidad+'</td>';
    valueTable+='</tr>';

    $('#addProducts').append(valueTable);
    $('#productSelect option').remove();
    $('#cantidadProduct').val('');
    $("#Addproducts").modal("hide");
    listarSelectProd();
  }
}

// funciones modales

function srcProduct(){
  $("#Addproducts").modal("show");
}
</script>
