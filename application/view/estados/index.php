<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <b class="box-title">Estados</b>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="tableEstados" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
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

<div class="modal fade" id="myModal" role="dialog"> <!--Div que contiene la ventana modal-->
<div class="modal-dialog">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Editar Estado</h3>
            </div>
            <form>
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >ID</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número de cedula o el NIT de la empresa"
                            name="identificador" id="identificador" autocomplete="off">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="nomEstado">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre del Estado"
                        name="nomEstado" id="nomEstado" autocomplete="off" maxlength="14">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="eviarEditEstado()">Modificar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>

</div>
</div>


<script>

$(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        tabla =	$('#tableEstados').DataTable( {
        "ajax": {
            "url": Url+'/estados/listarEstado',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "ID","className": 'centeer'  },
            { "data": "Nombre","className": 'centeer'  },
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
function editarEstado(idE,nomE) //funcion plasmar los datos del usuario en los inputs
{
  $('#identificador').val(idE);
  $('#nomEstado').val(nomE);
  document.getElementById("identificador").disabled = true;
  $("#myModal").modal("show");
}


function eviarEditEstado(){
        var patron = /[0-9]/;
        var nombreEstado = $('#nomEstado').val();
        var idEstado = $('#identificador').val();

        var Max_length =14;
        var length_nombreEstado = $('#nomEstado').val().length;


        if ((nombreEstado == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
            return false;
        }
        else if (patron.test(nombreEstado)){
//sintaxis para validar que el campo no contenga números.
//patron es la experesion regular, dentro del .test() se pone la variable a comparar
            swal("Upss", "No se permite ingresar números!", "error");
        } else if (length_nombreEstado >Max_length) {
          swal("Upss", "Has ingresado una logitud no válida!", "error");
        }else {
            $.ajax({
                url: Url+'estados/editarEstado',
                type:'POST',
                data:{
                identificador: idEstado,
                nomEstado: nombreEstado
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "La modificación ha sido completado!", "success");
                    $("#myModal").modal("hide");
                    tabla.ajax.reload(null,false);
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }

    }

function eliminarEstado(idE) {
  swal({
        title: "¿Estas Seguro?",
        text: "Si eliminas este registro ya no se podrá recuperar!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Estado eliminado!", {
            icon: "success",
          });
          $.ajax({
            url:Url+'/estados/eliminarEstado',
            type:'POST',
            data:{identificador:idE}
        }).done(function(data){
            if(data){
                tabla.ajax.reload(null,false);
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
