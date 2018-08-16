<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Empleado</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="tableCliente" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>Cedula o NIT</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
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

<div id="modalClienteEdit" class="hidden">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Clientes</h3>
            </div>
            <form>
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->
              
                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Cedula o NIT</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número de cedula o el NIT de la empresa"
                            name="identificador" id="identificador">

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
                        name="nomCliente" id="nomCliente">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="apeCliente">Apellido</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos"
                        name="apeCliente" id="apeCliente">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="correoCliente">Correo</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="example@domain.com"
                         name="correoCliente" id="correoCliente">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="direcCliente">Dirección</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese la direccion de su hogar"
                        name="direcCliente" id="direcCliente">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="telCliente">Teléfono</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número teléfonico"
                        name="telCliente" id="telCliente">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="passCliente">Contraseña</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Ingrese su Contraseña" autocomplete="off"
                        name="passCliente" id="passCliente">

                    </div><!--cierre div del input-->
                </div> <!--cierre del div contenedor del input-->

            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="registrar()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>
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
            { "data": "Eliminar", "orderable": false  }
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

function editarCliente(idC,nomC,apeC,CorrC,dicCl,telC,contrC) //funcion para buscar los datos del cliente que se desea modificar
{
  $.ajax({
    url: Url+'/cliente/editarCliente',
    type:'POST',
    data:{
      identificador: idC,
      nomCliente: nomC,
      apeCliente: apeC,
      correoCliente: CorrC,
      direcCliente: dicCl,
      telCliente: telC,
      passCliente: contrC
    }
    })/*.done(function(data){
        window.location="<?php echo URL; ?>cliente/editCliente"; 
    })*/
}

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
              location.reload();
            }else{
                swal("Algo anda mal!", "La eliminacion no se ha ejecutado!", "error");
            }
        })
        } else {
          swal("Eliminación cancelada!");
        }
      });
}
</script>

