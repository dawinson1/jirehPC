<div class="content-wrapper">
  <center><h3 class="box-title">Registrar Pedido</h3></center>
<section class="content">
<div class="row">

<div class="col-md-12">
<div class="box box-info">

            <form enctype="multipart/form-data" autocomplete="off" id="actImgPerfilClient">
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
                    <label for="refProduct">Buscar producto</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese la referencia del producto"
                        name="refProduct" id="refProduct">

                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="srcProduct()"><i class="fa fa-search"></i></button>
                        </span>

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
<div class="modal-dialog modal-lg">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Seleccione un producto</h3>
            </div>

              <!-- /.box-header -->
              <div class="table-responsive">
              <table id="tableProducts" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                  <tr>
                    <th>Referencia</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Valor total</th>
                    <th>Opción</th>
                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="actuaImg()">Actualizar</button>
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
})

//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yy'
    })

//listas
//listarProductos

$(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        tabla =	$('#tableProducts').DataTable( {
        "ajax": {
            "url": Url+'/pedido/ListProducts',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "Referencia","className": 'centeer'  },
            { "data": "Nombre","className": 'centeer'  },
            { "data": "Cantidad","className": 'centeer'  },
            { "data": "PrecioUnit","className": 'centeer'  },
            { "data": "Elegir", "orderable": false  },
            { "data": "Actualizar", "orderable": false  }
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
        "scrollX": false,
        // "dom": 'lrtipB',
        "language": {
            "url": Url+"/js/lenguaje.json"
        },
        } );
});

// funciones modales

function srcProduct(){
  $("#Addproducts").modal("show");
}
</script>
