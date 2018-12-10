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
                  <th>Cambiar Estado <br>Pendiente/Finalizado</th>
                  <th>Cancelar Pedido</th>
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
                  <h4>Pedido No. <span class="pedNumber" id="pedNumber"></span></h4>
                </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <h5 class="col-md-6"><b>ID Cliente: </b><span class="IDCliente"></span></h5>
                        <h5 class="col-md-6"><b>Nombre: </b><span class="nombreCliente"></span></h5>
                        <h5 class="col-md-6"><b>ID Empleado: </b><span class="IDEmple"></span></h5>
                        <h5 class="col-md-6"><b>Nombre: </b><span class="nombreEmple"></span></h5>
                        <h5 class="col-md-6"><b>Fecha Entrega: </b><span class="dateEntre"></span></h5>
                        <h5 class="col-md-6"><b>Estado: </b><span class="estadoPedido"></span></h5>
                        <h4 class="col-md-12"><b>Total Pedido: $</b><span class="precioTotal"></span></h4>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <table class="table table-striped table-bordered" style="width:100%" id="detalleProductos">
                      <caption class="hidden">
                        <div class="panel-heading">
                          <h4>Pedido No. <span class="pedNumber"></span></h4>
                        </div>
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-xs-12">
                                <h5 class="col-md-6"><b>ID Cliente: </b><span class="IDCliente"></span></h5>
                                <h5 class="col-md-6"><b>Nombre: </b><span class="nombreCliente"></span></h5>
                                <h5 class="col-md-6"><b>ID Empleado: </b><span class="IDEmple"></span></h5>
                                <h5 class="col-md-6"><b>Nombre: </b><span class="nombreEmple"></span></h5>
                                <h5 class="col-md-6"><b>Fecha Entrega: </b><span class="dateEntre"></span></h5>
                                <h5 class="col-md-6"><b>Estado: </b><span class="estadoPedido"></span></h5>
                                <h4 class="col-md-12"><b>Total Pedido: $</b><span class="precioTotal"></span></h4>
                              </div>
                            </div>
                          </div>
                      </caption>
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
            { "data": "Editar", "orderable": false, "render": function(data, type, full, meta){
              return data;
              }
            },
            { "data": "Eliminar", "orderable": false  }
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
        "scrollX": false,
        "fnDrawCallback": function() {
          $('.estPed1').bootstrapToggle('on');
          $('.estPed2').bootstrapToggle('off');
          $('.estPed2').bootstrapToggle('disable');
          $('.estPed3').bootstrapToggle('off');
          $('.estPed3').bootstrapToggle('disable');
          $('.btnCancel2').prop('disabled', true);
          $('.btnCancel3').prop('disabled', true);
        },
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

function verPedido(idPedido,idCli,nomCli,idEmp,nomEmp,entrega,estado,totalPed) //funcion para enviar los cambios al controlador
{
  $('.pedNumber').text(idPedido);
  $('.IDCliente').text(idCli);
  $('.nombreCliente').text(nomCli);
  $('.IDEmple').text(idEmp);
  $('.nombreEmple').text(nomEmp);
  $('.dateEntre').text(entrega);
  $('.estadoPedido').text(estado);
  $('.precioTotal').text(totalPed);
  $.ajax({
      url: Url+'/detalle_pedido/seeOrder',
      type:'POST',
      dataType: "json",
      data: {
        idP: idPedido
      }
    }).done(function(data){
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
      pagTabla();
      tablaverPed.rows().remove().draw();
      tablaverPed.rows.add($(verPedi)).draw();
      $('#listadosDetalle').empty();
      $('#listadosDetalle').append(verPedi);
      $('#verPedido').modal('show');
    })
}

function cancelarPed(idPed) {
  swal({
        title: "¿Estás Seguro?",
        text: "Si Cancelas el Pedido, su estado cambiará a cancelado y los productos regresarán al inventario!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          NewEstado = 3;
          $.ajax({
            url: Url+'/detalle_pedido/pedCancel',
            type:'POST',
            data: {idPedido: idPed,
              idEstPed: NewEstado
            }
          }).done(function(data){
            tabla.ajax.reload(null,false);
          })
      } else {
        tabla.ajax.reload();
      }
      });
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


function changeStatusPed(idEst, idPed) {
  $('#togglePed_'+idPed+'').change(function() {
    swal({
          title: "¿Estás Seguro?",
          text: "Si finalizas el pedido, su estado ya no se podrá cambiar!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            var NewEstado= '';
            if (idEst == 1) {
              NewEstado = 2;
              $.ajax({
                url: Url+'/pedido/cambiarEstadoPed',
                type:'POST',
                data: {idPedido: idPed,
                  idEstPed: NewEstado
                }
              }).done(function(data){
                tabla.ajax.reload(null,false);
              })
            } else if (idEst == 2) {
              NewEstado = 1;
              $.ajax({
                url: Url+'/pedido/cambiarEstadoPed',
                type:'POST',
                data: {idPedido: idPed,
                  idEstPed: NewEstado
                }
              }).done(function(data){
                tabla.ajax.reload(null,false);
              })
            }
        } else {
          tabla.ajax.reload();
        }
        });
  })
}

function pagTabla() {
  let numPed = $('#pedNumber').text();
  $.fn.dataTable.ext.errMode = 'throw';
  tablaverPed =	$('#detalleProductos').DataTable( {
  "lengthMenu": [[3, 6, 12, 25, -1], [3, 6, 12, 25, "Todo"]],
  "scrollX": false,
  "retrieve": true,
  "paging": true,
   "dom": 'flrtipB',
  "language": {
      "url": Url+"/js/lenguaje.json"
  },
  buttons: [
            {
                extend: 'pdf',
                orientation: 'landscape',
                title: 'Comprobante de pedido',
                text: 'Exportar en PDF',
                filename: `Jireh PC Pedido No. `+numPed+``,
                messageBottom: null,
                customize: function ( doc ) {
                // Splice the image in after the header, but before the table
                doc.content.splice( 1, 0, {
                    margin: [ 0, 0, 0, 12 ],
                    alignment: 'center',
                    image: `data:image/png;base64,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`
                } );
                // Data URL generated by http://dataurl.net/#dataurlmaker
            }
            },
        ]
  });
}

</script>
