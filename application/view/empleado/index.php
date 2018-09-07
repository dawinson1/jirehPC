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
            <div class="box-body">
            <table id="tableEmpleado" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Cédula</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Editar</th>
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
                            name="idEmpleado" id="idEmpleado" autocomplete="off">

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
                        name="nombre" id="nombre" autocomplete="off">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="apellido">Apellido</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos"
                        name="apellido" id="apellido" autocomplete="off">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="telefono">Teléfono</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Número de Teléfono"
                         name="telefono" id="telefono" autocomplete="off">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="correo">Email</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="email" class="form-control" placeholder="Ingrese la direccion de Correo"
                        name="correo" id="correo" autocomplete="off">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                 <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="passEmpl">Contraseña</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Ingrese su Contraseña" autocomplete="off"
                        name="passEmpl" id="passEmpl">

                    </div><!--cierre div del input-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="id_rol">Rol</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese número de Rol"
                        name="id_rol" id="id_rol" autocomplete="off">

                    </div><!--cierre div del input-->
                </div> <!--cierre del div contenedor del input-->


            <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="id_estado">Estado</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Estado"
                        name="id_estado" id="id_estado" autocomplete="off">

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
            { "data": "Editar", "orderable": false},
            { "data": "Eliminar", "orderable": false}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
        "scrollX": false,
        "language": {
            "url": Url+"/js/lenguaje.json"
        },
        responsive: true,
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

function eliminarEmpleado(idEm) {
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
            url:Url+'/empleado/eliminarEmpleado',
            type:'POST',
            data:{idEmpleado:idEm}
        }).done(function(data){
            if(data){
              setTimeout('location.reload()',1000);
            }else{
                swal("Algo anda mal!", "La eliminacion no se ha ejecutado!", "error");
            }
        })
        } else {
          swal("Eliminación cancelada!");
        }
      });
}

function editarEmpleado(idEm,nomEm,apeEm,telEm,mailEm,contrEm,idRol,idEstado) //funcion plasmar los datos del usuario en los inputs
{
  $('#idEmpleado').val(idEm);
  $('#nombre').val(nomEm);
  $('#apellido').val(apeEm);
  $('#telefono').val(telEm);
  $('#correo').val(mailEm);
  $('#passEmpl').val(contrEm);
  $('#id_rol').val(idRol);
  $('#id_estado').val(idEstado);
  document.getElementById("idEmpleado").disabled = true;
  $("#myModal").modal("show");
}


function enviarEditEmpleado() //funcion para enviar los cambios al controlador
{
        var idEm = $('#idEmpleado').val();
        var nomEm = $('#nombre').val();
        var apeEm = $('#apellido').val();
        var telEm = $('#telefono').val();
        var mailEm = $('#correo').val();
        var contrEm = $('#passEmpl').val();
        var idRol = $('#id_rol').val();
        var idEstado = $('#id_estado').val();
    
        if ((idEm == "") || (nomEm == "") || (apeEm == "") || (telEm == "") || (mailEm == "") || (contrEm == "") || (idRol == "") || (idEstado == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        } else {
            $.ajax({
                url: Url+'/empleado/editarEmpleado',
                type:'POST',
                data:{idEmpleado: idEm,
                    nombre: nomEm,
                    apellido: apeEm,
                    telefono:telEm,
                    correo: mailEm,
                    passEmpl:contrEm,
                    id_rol: idRol,
                    id_estado:idEstado
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
                    $('#passEmpl').val('');
                    $('#id_rol').val('');
                    $('#id_estado').val('');
                    $("#myModal").modal("hide");
                    setTimeout('location.reload()',2000);
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }
}

</script>