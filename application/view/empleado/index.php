<div class="content-wrapper" id="carga" >
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <b class="box-title">Empleado</b>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="tableEmpleado" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Cédula</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Foto Perfil</th>
                  <th>Editar</th>
                  <th>Cambiar estado: <br>Activo/Inactivo</th>
                  <th>Actualizar<br>Foto</th>
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

<div class="modal fade" id="myModal" role="dialog"> <!--Div que contiene la ventana modal EDITAR-->
<div class="modal-dialog">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Editar Empleado</h3>
            </div>
            <form>
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="idEmpleado" >Cédula</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número de cedula o el NIT de la empresa"
                            name="idEmpleado" id="idEmpleado" autocomplete="off" maxlength="10">

                        <div class="input-group-addon"> <!--Este div es opcional, servirá cuando queramos que en frente del input este otro icono-->
                        <i class="glyphicon glyphicon-search"></i>
                        </div> <!--Cierre del div opcional-->

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="nombre">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese nombre"
                        name="nombre" id="nombre" autocomplete="off" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="apellido">Apellido</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos"
                        name="apellido" id="apellido" autocomplete="off" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="telefono">Teléfono</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Número de Teléfono"
                         name="telefono" id="telefono" autocomplete="off" maxlength="19">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="correo">Email</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="email" class="form-control" placeholder="Ingrese la direccion de Correo"
                        name="correo" id="correo" autocomplete="off" maxlength="29">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                 <!--Aca iba el espacio de la contraseña-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="id_rol">Rol</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <select id="id_rol" class="form-control" name="id_rol">

                        </select>

                    </div><!--cierre div del input-->
                </div> <!--cierre del div contenedor del input-->


            <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="id_estado">Estado</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <select id="id_estado" class="form-control" name="id_estado">

                        </select>

                    </div><!--cierre div del input-->
                </div> <!--cierre del div contenedor del input-->

            </div> <!--Cierre del Div contenedor-->


            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="enviarEditEmpleado()">Modificar</button>
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
            <form autocomplete="off" enctype="multipart/form-data" id="actImgPerfilEmpleado">
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

              <div class="form-group hidden" id="DivInputImg"> <!--Comienzo del div contenedor del input-->
                  <label for="idEmpleadoimg" >Cédula:</label>

                  <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control"
                          name="idEmpleadoimg" id="idEmpleadoimg">

                  </div><!--cierre div del inputt-->
              </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="imgEmpleado" >Seleccione Imagen de Perfil</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->

                        <input type="file" class="form-control"
                            name="imgEmpleado" id="imgEmpleado">

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
        tabla =	$('#tableEmpleado').DataTable( {
        "ajax": {
            "url": Url+'/empleado/listarEmpleado',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "Nombre","className": 'centeer'  },
            { "data": "Apellido","className": 'centeer'  },
            { "data": "Teléfono","className": 'centeer'  },
            { "data": "Correo","className": 'centeer'  },
            { "data": "Cédula","className": 'centeer'  },
            { "data": "Rol","className": 'centeer' },
            { "data": "Estado", "className": 'centeer'},
            { "data": "Foto Perfil", "render":function(data,type,row){
              return '<center><img src="<?php echo URL; ?>'+data+'" width="120" height="80" /></center>';
              }
            },
            { "data": "Editar", "orderable": false},
            { "data": "Eliminar", "orderable": false, "render": function(data, type, full, meta){
              return data;
              }
            },
            { "data": "Actualizar Foto", "orderable": false  }
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
        "scrollX": false,
        "fnDrawCallback": function() {
          $('.toggle-Empleado').bootstrapToggle();
        },
        "language": {
            "url": Url+"/js/lenguaje.json"
        },
        //responsive: true,
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

function changeStatusEmp(idEst, idEmp) {
  $.ajax({
    url: Url+'/empleado/cambiarEstadoEmp',
    type:'POST',
    data: {idEmpleado: idEmp,
      idEstEmp: idEst
    }
    }).done(function(data){
      tabla.ajax.reload(null,false);
    })
}

function editarEmpleado(idEm,nomEm,apeEm,telEm,mailEm,idRol,idEstado) //funcion plasmar los datos del usuario en los inputs
{
  $('#idEmpleado').val(idEm);
  $('#nombre').val(nomEm);
  $('#apellido').val(apeEm);
  $('#telefono').val(telEm);
  $('#correo').val(mailEm);
  $('#id_rol').val(idRol);
  $('#id_estado').val(idEstado);
  document.getElementById("idEmpleado").disabled = true;
  $("#myModal").modal("show");
}

$('#imgEmpleado').fileinput({
        theme: 'fa',
        language: 'es',
        showUpload : false,
        allowedFileExtensions: ['jpg', 'png', 'jpeg']
    });


function enviarEditEmpleado() //funcion para enviar los cambios al controlador
{
  var patronNum = /[0-9]/;
  var patronLetrEspecial = /\D/;
  var patronSoloLetr = /[^A-Za-záéíóúüñ ]/;
  var patronCorreo = /\w+@\w+\.+[a-z]/

  var Max_LengthTel = 19;
  var Max_LengthID = 10;
  var Max_LengthNomsDicc = 24;
  var Max_LengthEmail = 29;
  var Max_Lengthpass = 15;
  var Min_Lengthpass = 8;

  var length_idEmpleado = $('#idEmpleado').val().length;
  var length_nombreEmpleado = $('#nombre').val().length;
  var length_apellido = $('#apellido').val().length;
  var length_telefono = $('#telefono').val().length;
  var length_correo = $('#correo').val().length;

  var idEmpleado = $('#idEmpleado').val();
  var nombreEmpleado = $('#nombre').val();
  var apellido = $('#apellido').val();
  var telefono = $('#telefono').val();
  var correo = $('#correo').val();
  var id_rol = $('#id_rol').val();
  var id_estado = $('#id_estado').val();

  if ((idEmpleado == "") || (nombre == "") || (apellido == "") || (telefono == "") || ( correo == "") || ( id_estado == "") || (id_rol == "") ||  (id_rol == "Seleccionar") || (id_estado == "Seleccionar")) { //Valida si los campos estan vacios
      swal("Upss", "Los campos no pueden ir vacios!", "error");
  } else if (patronLetrEspecial.test(idEmpleado)){
//sintaxis para validar que el campo no contenga números. patron es la experesion regular, dentro del .test() se pone la variable a comparar
    //$( "#alertID" ).addClass( "has-error" );
    swal("Upss", "No se permite ingresar letras y/o caracteres especiales!", "error");

  }else if (patronSoloLetr.test(nombreEmpleado)){

      swal("Upss", "No se permite ingresar números y/o caracteres en el campo Nombre!", "error");

    } else if (patronSoloLetr.test(apellido)){

      swal("Upss", "No se permite ingresar números y/o caracteres en el campo Apellido!", "error");

    } else if (!patronCorreo.test(correo)){

      swal("Upss", "El correo ingresado no es válido!", "error");

    } else if (patronLetrEspecial.test(telefono)){

      swal("Upss", "El teléfono ingresado no es válido!", "error");

    } else if ((length_idEmpleado>Max_LengthID) || (length_nombreEmpleado>Max_LengthNomsDicc) ||
      (length_apellido>Max_LengthNomsDicc) || (length_correo>Max_LengthEmail) ||
      (length_telefono>Max_LengthTel)) {
        swal("Upss", "Has ingresado una longitud no válida!", "error");
    } else {
            $.ajax({
                url: Url+'/empleado/editarEmpleado',
                type:'POST',
                data:{idEmpleado: idEmpleado,
                    nombre: nombreEmpleado,
                    apellido: apellido,
                    telefono: telefono,
                    correo: correo,
                    id_rol: id_rol,
                    id_estado:id_estado
                /*correo(Controlador), mailEm trae los datos que llegan por el id del inpt */
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#idEmpleado').val('');
                    $('#nombre').val('');
                    $('#apellido').val('');
                    $('#telefono').val('');
                    $('#correo').val('');
                    $('#id_rol').val('');
                    $('#id_estado').val('');
                    $("#myModal").modal("hide");
                    tabla.ajax.reload(null,false);
                    //setTimeout('location.reload()',2000);
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }
}

function actuaImg() //funcion para enviar los cambios al controlador
{
  var datosimg = new FormData($('#actImgPerfilEmpleado')[0]);
  console.log(datosimg)

      $.ajax({
          url: Url+'/empleado/actImgEmpleado',
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
            $('#idEmpleadoimg').val('');
            $('#imgEmpleado').fileinput('clear');
            $("#myModalFile").modal("hide");
            tabla.ajax.reload(null,false);
          }

          })
}


function showModalImg(idEm) //funcion plasmar los datos del usuario en los inputs
{
  $('#idEmpleadoimg').val(idEm);
  //document.getElementById("idClientMimg").disabled = true;
  $('#DivInputImg').hide();
  $("#myModalFile").modal("show");
}



$(function(){
  listarSelectRol();
  listarSelectEstado();
})


function listarSelectRol() {
  $.ajax({
     url:Url+'/empleado/listarRoles',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelectRol = '';
     data.forEach(function(p){
      valueSelectRol+='<option value='+p.idRol+'>'+p.Nombre+'</option>';
     })
     $('#id_rol').empty();
     $('#id_rol').html('<option value="" selected="selected">Seleccionar</option>');
     $('#id_rol').append(valueSelectRol);
 })
}

function listarSelectEstado() {
  $.ajax({
     url:Url+'/empleado/listarEstados',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelectEstado = '';
     data.forEach(function(p){
      valueSelectEstado+='<option value='+p.id_estado+'>'+p.nombre+'</option>';
     })
     $('#id_estado').empty();
     $('#id_estado').html('<option value="" selected="selected">Seleccionar</option>');
     $('#id_estado').append(valueSelectEstado);
 })
}

</script>
