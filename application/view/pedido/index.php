<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <b class="box-title">Pedidos</b>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="tablePedidos" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>No. Pedido</th>
                  <th>ID Cliente</th>
                  <th>Fecha de Entrega</th>
                  <th>ID Empleado</th>
                  <th>Estado</th>
                  <th>Precio</th>
                  <th>Ver Pedido</th>
                  <th>Editar Pedido</th>
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

<div class="modal fade" id="verPedido" role="dialog"> <!--Div que contiene la ventana modal-->
<div class="modal-dialog" tabindex="-1">

<section class="content modal-content" style="border-radius: 10px;">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Detalles del Pedido</h3>
            </div>
            <form>
            <div class="box-body modal-body" id=verDetalles> <!--Este Div es contenedor de los imputs-->
              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                  <h4>Pedido No. <span id="pedNumber"></span></h4>
                </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <h5 class="col-md-6"><b>ID Cliente: </b><span id="IDCliente"></span></h5>
                        <h5 class="col-md-6"><b>Nombre: </b><span id="nombreCliente"></span></h5>
                        <h5 class="col-md-6"><b>ID Empleado: </b><span id="IDEmple"></span></h5>
                        <h5 class="col-md-6"><b>Nombre: </b><span id="nombreEmple"></span></h5>
                        <h5 class="col-md-6"><b>Fecha Entrega: </b><span id="dateEntre"></span></h5>
                        <h5 class="col-md-6"><b>Estado: </b><span id="estadoPedido"></span></h5>
                        <h4 class="col-md-12"><b>Total Pedido: $</b><span id="precioTotal"></span></h4>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <table class="table table-striped table-bordered" style="width:100%" id="detalleProductos">
                      <thead>
                        <tr>
                          <th>Referencia</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Valor c/u</th>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                      <tbody id="listadosDetalle">

                      </tbody>
                    </table>
                  </div>
                  <!-- Table -->


              </div>

            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
        tabla =	$('#tablePedidos').DataTable( {
        "ajax": {
            "url": Url+'/detalle_pedido/listPedido',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "id_pedido","className": 'centeer'  },
            { "data": "idCliente","className": 'centeer'  },
            { "data": "dateEntrega","className": 'centeer'  },
            { "data": "id_emplo","className": 'centeer'  },
            { "data": "nomEstPedi", "className": 'centeer' },
            { "data": "totalPedido", "className": 'centeer' },
            { "data": "verPedi", "orderable": false  },
            { "data": "Editar", "orderable": false  },
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
  var id_cliente = $('#identificador').val();
        var nombreCliente = $('#nomCliente').val();
        var apellidoCliente = $('#apeCliente').val();
        var correoCliente = $('#correoCliente').val();
        var direccionCliente = $('#direcCliente').val();
        var telefono = $('#telCliente').val();

        if ((id_cliente == "") || (nombreCliente == "") || (apellidoCliente == "") || (correoCliente == "") || (direccionCliente == "") || (telefono == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
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

function verPedido(idPedido,idCli,nomCli,idEmp,nomEmp,entrega,estado,totalPed) //funcion para enviar los cambios al controlador
{
  $('#pedNumber').text(idPedido);
  $('#IDCliente').text(idCli);
  $('#nombreCliente').text(nomCli);
  $('#IDEmple').text(idEmp);
  $('#nombreEmple').text(nomEmp);
  $('#dateEntre').text(entrega);
  $('#estadoPedido').text(estado);
  $('#precioTotal').text(totalPed);
  $.ajax({
      url: Url+'/detalle_pedido/seeOrder',
      type:'POST',
      dataType: "json",
      data: {
        idP: idPedido
      }
    }).done(function(data){
       //console.log(data);
      var verPedi = '';
      data.forEach(function(vp){
        verPedi += `<tr>
          <td>`+vp.refer+`</td>
          <td>`+vp.nomPro+`</td>
          <td>`+vp.cantSoli+`</td>
          <td>`+vp.Vcu+`</td>
          <td>`+vp.Vsub+`</td>
        </tr>`;
      })
      $('#listadosDetalle').empty();
      $('#listadosDetalle').append(verPedi);
      $('#verPedido').modal('show');
      pagTabla();
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

function pagTabla() {
  $.fn.dataTable.ext.errMode = 'throw';
  tabla =	$('#detalleProductos').DataTable( {

  "lengthMenu": [[3, 6, 12, 25, -1], [3, 6, 12, 25, "Todo"]],
  "scrollX": false,
  "retrieve": true,
  "paging": true,
  // "dom": 'lrtipB',
  "language": {
      "url": Url+"/js/lenguaje.json"
  },
  });
}

</script>
