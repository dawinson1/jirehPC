<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <b class="box-title">Marca</b>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="tableMarca" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Cambiar estado:<br>Activo/Inactivo</th>
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
              <h3 class="box-title">Editar Marca</h3>
            </div>
            <form>
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Id</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Id"
                            name="identificador" id="identificador" autocomplete="off">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="nomMarca">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre de la Marca"
                        name="nomMarca" id="nomMarca"  autocomplete="off" maxlength="20" >

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="enviarEditMarca()">Modificar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>

</div>
</div>


<script>

$(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        tabla =	$('#tableMarca').DataTable( {
        "ajax": {
            "url": Url+'/marca/listarMarca', // función en el controlador
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "ID","className": 'centeer'  },
            { "data": "Nombre","className": 'centeer'  },   
            { "data": "Estado", "className": 'centeer'}, 
            { "data": "Editar", "orderable": false  },                      
            { "data": "Eliminar", "orderable": false, "render": function(data, type, full, meta){
              return data;  }
            },
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
        "scrollX": false,
        "fnDrawCallback": function() {
          $('.toggle-Marca').bootstrapToggle();
          $('.estMarc1').bootstrapToggle('on');
          $('.estMarc2').bootstrapToggle('off');
        },
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

                //CAMBIAR ESTADO
function changeStatusMarca(idEst, idMar) {
  $('#toggleMarca_'+idMar+'').change(function() {
    var NewEstado= '';
      if (idEst == 1) {
        NewEstado = 2;
        $.ajax({
          url: Url+'/marca/cambiarEstadoMarca',
          type:'POST',
          data: {idmarca: idMar,
            idEstMarca: NewEstado
          }
          }).done(function(data){
            tabla.ajax.reload(null,false);
          })
      } else if (idEst == 2) {
        NewEstado = 1;
        $.ajax({
          url: Url+'/marca/cambiarEstadoMarca',
          type:'POST',
          data: {idmarca: idMar,
            idEstMarca: NewEstado
          }
          }).done(function(data){
            tabla.ajax.reload(null,false);
          })
      }
    })
}


function editarMarca(idMar,nomMar) //funcion plasmar los datos del usuario en los inputs
{
  $('#identificador').val(idMar);
  $('#nomMarca').val(nomMar);
  document.getElementById("identificador").disabled = true;
  $("#myModal").modal("show");
}


function enviarEditMarca(){
        var patron = /[0-9]/;
        var nombreM = $('#nomMarca').val();
        var idMarc = $('#identificador').val();
        var length_nombre = $('#nomMarca').val().length;
        var Max_LengthNombre = 25;



        if ((nombreM == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
            return false;
        }
        else if (patron.test(nombreM)){
          //sintaxis para validar que el campo no contenga números.
          //patron es la experesion regular, dentro del .test() se pone la variable a comparar
        swal("Upss", "No se permite ingresar números!", "error");
    }else if (length_nombre>Max_LengthNombre) {
      swal("Upss", "Solo debe tener un Máximo  de 25 caracteres!", "error");
         } else {
            $.ajax({
                url: Url+'marca/editarMarca',
                type:'POST',
                data:{
                    identificador: idMarc,
                    nomMarca: nombreM
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "La modificación ha sido completada!", "success");
                    $("#myModal").modal("hide");
                   // setTimeout('location.reload()',2000);
                   tabla.ajax.reload(null,false);
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }

    }
    

function eliminarMarca(idMar) {
  swal({
        title: "¿Estas Seguro?",
        text: "Si eliminas este registro ya no se podrá recuperar!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Marca eliminada!", {
            icon: "success",
          });
          $.ajax({
            url:Url+'/marca/eliminarMarca',
            type:'POST',
            data:{identificador:idMar}
        }).done(function(data){
            if(data){
               // setTimeout('location.reload()',2000);
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