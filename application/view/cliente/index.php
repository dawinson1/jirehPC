<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <b class="box-title">Clientes</b>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="tableCliente" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>Cedula o NIT</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
                  <th>Editar</th>
                  <th>Foto Perfil</th>
                  <th>Actualizar<br>Foto</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="myModal" role="dialog"> <!--Div que contiene la ventana modal-->
<div class="modal-dialog">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Editar Clientes</h3>
            </div>
            <form>
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Cédula o NIT</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número de cedula o el NIT de la empresa"
                            name="identificador" id="identificador" maxlength="14">

                        <div class="input-group-addon"> <!--Este div es opcional, servirá cuando queramos que en frente del input este otro icono-->
                        <i class="glyphicon glyphicon-search"></i>
                        </div> <!--Cierre del div opcional-->

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="nomCliente">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus nombres"
                        name="nomCliente" id="nomCliente" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="apeCliente">Apellido</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos"
                        name="apeCliente" id="apeCliente" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="correoCliente">Correo</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="example@domain.com"
                         name="correoCliente" id="correoCliente" maxlength="29">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="direcCliente">Dirección</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese la direccion de su hogar"
                        name="direcCliente" id="direcCliente" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="telCliente">Teléfono</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número teléfonico"
                        name="telCliente" id="telCliente" maxlength="14">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="enviarEditCliente()">Modificar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>

</div>
</div>

<!-- Ventan modal para la actualización de la imagen de perfil-->

<div class="modal fade" id="myModalFile" role="dialog"> <!--Div que contiene la ventana modal-->
<div class="modal-dialog">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Actualizar Foto de perfil</h3>
            </div>
            <form autocomplete="off" enctype="multipart/form-data" id="actImgPerfilClient">
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

              <div class="form-group hidden" id="DivInputImg"> <!--Comienzo del div contenedor del input-->
                  <label for="idClientMimg" >Cedula o NIT</label>

                  <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control"
                          name="idClientMimg" id="idClientMimg">

                  </div><!--cierre div del inputt-->
              </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="imgClient" >Selecciones imagen de perfil</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->

                        <input type="file" class="form-control"
                            name="imgClient" id="imgClient">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="actuaImg()">Actualizar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>

</div>
</div>


<script>

$(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        tabla =	$('#tableCliente').DataTable( {
        "ajax": {
            "url": Url+'/cliente/listarCliente',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "Cedula o NIT","className": 'centeer'  },
            { "data": "Nombre","className": 'centeer'  },
            { "data": "Apellido","className": 'centeer'  },
            { "data": "Correo","className": 'centeer'  },
            { "data": "Dirección","className": 'centeer' },
            { "data": "Telefono", "className": 'centeer' },
            { "data": "Editar", "orderable": false  },
            { "data": "Foto Perfil", "render":function(data,type,row){
              return '<center><img src="<?php echo URL; ?>'+data+'" width="120" height="80" /></center>';
              }
            },
            { "data": "Actualizar Foto", "orderable": false  },
            { "data": "Eliminar", "orderable": false  }
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
        "scrollX": false,
        // "dom": 'lrtipB',
        "language": {
            "url": Url+"/js/lenguaje.json"
        },

        buttons: [
            {extend: 'copy',exportOptions: {columns: [0,1,2,3,4]}},
            {extend: 'csv',exportOptions: {columns: [0,1,2,3,4]}},
            {extend: 'excel',title: 'Empleado',exportOptions: {columns: [0,1,2,3,4]}},
            {extend: 'pdf', title: 'Empleado',exportOptions: {columns: [0,1,2,3,4]}},
            {extend: 'print',
            exportOptions: {columns: [0,1,2,3,4]},
            customize: function (win){
            $(win.document.body).addClass('white-bg');
            $(win.document.body).css('font-size', '10px');

            $(win.document.body).find('table')
            .addClass('compact')
            .css('font-size', 'inherit');
            }
        }
        ]
        } );

});

function enviarEditCliente() //funcion para enviar los cambios al controlador
{
  var patronNum = /[0-9]/;
  var patronLetrEspecial = /\D/;
  var patronSoloLetr = /[^A-Za-záéíóúüñ ]/;
  var patronCorreo = /\w+@\w+\.+[a-z]/;

  var Max_LengthIDtTel = 14;
  var Max_LengthNomsDicc = 24;
  var Max_LengthEmail = 29;

  var length_id_cliente = $('#identificador').val().length;
  var length_nombreCliente = $('#nomCliente').val().length;
  var length_apellidoCliente = $('#apeCliente').val().length;
  var length_correoCliente = $('#correoCliente').val().length;
  var length_telefono = $('#telCliente').val().length;

  var id_cliente = $('#identificador').val();
  var nombreCliente = $('#nomCliente').val();
  var apellidoCliente = $('#apeCliente').val();
  var correoCliente = $('#correoCliente').val();
  var direccionCliente = $('#direcCliente').val();
  var telefono = $('#telCliente').val();

  if ((id_cliente == "") || (nombreCliente == "") || (apellidoCliente == "") || (correoCliente == "") || (direccionCliente == "") || (telefono == "") ) { //Valida si los campos estan vacios
    swal("Upss", "Los campos no pueden ir vacios!", "error");

  } else if (patronLetrEspecial.test(id_cliente)){
    //sintaxis para validar que el campo no contenga números. patron es la experesion regular, dentro del .test() se pone la variable a comparar
    //$( "#alertID" ).addClass( "has-error" );
    swal("Upss", "No se permite ingresar letras y/o caracteres especiales!", "error");

  }else if (patronSoloLetr.test(nombreCliente)){

      swal("Upss", "No se permite ingresar números y/o caracteres en el campo Nombre!", "error");

    } else if (patronSoloLetr.test(apellidoCliente)){

      swal("Upss", "No se permite ingresar números y/o caracteres en el campo Apellido!", "error");

    } else if (!patronCorreo.test(correoCliente)){

      swal("Upss", "El correo ingresado no es válido!", "error");

    } else if (patronLetrEspecial.test(telefono)){

      swal("Upss", "El teléfono ingresado no es válido!", "error");

    } else if ((length_id_cliente>Max_LengthIDtTel) || (length_nombreCliente>Max_LengthNomsDicc) ||
      (length_apellidoCliente>Max_LengthNomsDicc) || (length_correoCliente>Max_LengthEmail) ||
      (length_telefono>Max_LengthIDtTel)) {

        swal("Upss", "Has ingresado una longitud no válida!", "error");    
    } else {
            $.ajax({
                url: Url+'/cliente/editarCliente',
                type:'POST',
                data:{identificador: id_cliente,
                nomCliente: nombreCliente,
                apeCliente: apellidoCliente,
                correoCliente: correoCliente,
                direcCliente: direccionCliente,
                telCliente: telefono
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#identificador').val('');
                    $('#nomCliente').val('');
                    $('#apeCliente').val('');
                    $('#correoCliente').val('');
                    $('#direcCliente').val('');
                    $('#telCliente').val('');
                    $("#myModal").modal("hide");
                    //setTimeout('location.reload()',2000);
                    tabla.ajax.reload(null,false);
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }
}

function actuaImg() //funcion para enviar los cambios al controlador
{
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


function showModalImg(idC) //funcion plasmar los datos del usuario en los inputs
{
  $('#idClientMimg').val(idC);
  //document.getElementById("idClientMimg").disabled = true;
  $('#DivInputImg').hide();
  $("#myModalFile").modal("show");
}

function editarCliente(idC,nomC,apeC,CorrC,dicCl,telC) //funcion plasmar los datos del usuario en los inputs
{
  $('#identificador').val(idC);
  $('#nomCliente').val(nomC);
  $('#apeCliente').val(apeC);
  $('#correoCliente').val(CorrC);
  $('#direcCliente').val(dicCl);
  $('#telCliente').val(telC);
  document.getElementById("identificador").disabled = true;
  $("#myModal").modal("show");
}

$('#imgClient').fileinput({
        theme: 'fa',
        language: 'es',
        showUpload : false,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
    });

function eliminarCliente(idC) {
  swal({
        title: "¿Estas Seguro?",
        text: "Si eliminas este registro ya no se podrá recuperar!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Registro eliminado!", {
            icon: "success",
          });
          $.ajax({
            url:Url+'/cliente/eliminarCliente',
            type:'POST',
            data:{identificador:idC}
        }).done(function(data){
            if(data){
              tabla.ajax.reload(null,false);
            }else{
                swal("Algo anda mal!", "La eliminacion no se ha ejecutado!", "error");
            }
        })
        }
      });
}
</script>
