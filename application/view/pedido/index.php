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
            { "data": "totalPedido", "className": 'centeer',"render": function(data, type, full, meta){
              var totalPrecioFormat = numberWithCommas(data);
              return totalPrecioFormat;
              }
            },
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
          $('.toggle-Pedido').bootstrapToggle();
          $('.estPed1').bootstrapToggle('disable');
          $('.estPed3').bootstrapToggle('disable');
          $('.btnCancel1').prop('disabled', true);
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
//Foarmat number jQuery
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function verPedido(idPedido,idCli,nomCli,idEmp,nomEmp,entrega,estado,totalPed) //funcion para enviar los cambios al controlador
{
  var totalPedFormat = numberWithCommas(totalPed);
  $('.pedNumber').text(idPedido);
  $('.IDCliente').text(idCli);
  $('.nombreCliente').text(nomCli);
  $('.IDEmple').text(idEmp);
  $('.nombreEmple').text(nomEmp);
  $('.dateEntre').text(entrega);
  $('.estadoPedido').text(estado);
  $('.precioTotal').text(totalPedFormat);
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
        var VcuFormat = numberWithCommas(vp.Vcu);
        var VSubFormat = numberWithCommas(vp.Vsub);
        verPedi += `<tr>
          <td>`+vp.refer+`</td>
          <td>`+vp.nomPro+`</td>
          <td>`+vp.cantSoli+`</td>
          <td>`+VcuFormat+`</td>
          <td>`+VSubFormat+`</td>
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
    swal({
          title: "¿Estás Seguro?",
          text: "Si finalizas el pedido, su estado ya no se podrá cambiar!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                url: Url+'/pedido/cambiarEstadoPed',
                type:'POST',
                data: {idPedido: idPed,
                  idEstPed: idEst
                }
              }).done(function(data){
                tabla.ajax.reload(null,false);
              })
        } else {
          tabla.ajax.reload(null,false);
        }
        });

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
                pageSize: 'LEGAL',
                title: 'Comprobante de pedido\n'+'JIREH PC',
                text: 'Exportar en PDF',
                filename: `Jireh PC Pedido No. `+numPed+``,
                messageBottom: {
                  lineHeight: 5,
                  text: '\n Autorizado por:',
                  alignment: 'center',
                },
                customize: function ( doc2 ) {
                  doc2.content.push( {
                    columns: [
                      {
                        alignment: 'center',
                        image: `data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOkAAAAyCAYAAAC5zvwPAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAA++SURBVHhe7Z0JtFXTG8B3IYkGJEUitcoQtUq8TKUkS0KoTJmHiEKtJbEMCz16qhWRTCmPMpQklaRC6FFoZWpQT0kypWggnP/9fe3vdDrvDufe7nvd13//1trrnPPtfc8795z97W/Y+7xbwYthHA5HzlLRbsucoqIiu5cexcXFpm/fvmbq1KlW4nDs3OwQJc3Pzzd5eXlm1KhRVhINFLt+/fpm0KBBpnbt2lbqcOzc7BAlHTp0qGyrVKki26ig2LBgwQLTrFkz2Xc4dnbKXEm7d+9uVq9ebbp27Wq6dOlipampUKGCbIcPH26aNGki+w7H/wNlqqQjR440hYWFso/LG5VDDz1Utj179jQ9evSQfUdyNm7caEaPHm2PHLnG3LlzzYYNG+xRCsjulhXVq1cnk+xVrlzZSlJz4YUXymdiimoljlR8+umncs8o//33n5U6coWffvpJns29995rJckpM0vau3dvs3btWtmPOoIUFBSYMWPGmL322st8++23VupIxgsvvGCaN28u++vXr/fDBEd6LFq0yFSqVMn06tXLSrLH4MGDZduuXTvZpsQqa6myZMkSGTliymYlqRkxYoR8pmbNmlbiSMUff/zhValSRe5b//79rdSRCR07dpT7+Pbbb1tJdvjyyy/lvGeffbaVpKZMlHTvvfeWCxs2bJiVJGf8+PHSHqXetGmTleYGnTp1ivw9ypLYyC/3jLL77rt7a9assTWOdFFFeuKJJ6wkO8ycOVPOG/NuvJ9//tlKU1PqSnrrrbfKhR199NFWkpynnnrK72zEVrnE8ccfL9f10ksvWUlugAXVe0aJhQa2xpEu3333nX8f//zzTyvNDnrem266yUqiUapKGouP/AtbsGCBlSbmuuuu89t/8803Vpob4D5yXRdffLGV5AarV6/2Klas6N83Opkjc2rUqCH3MdtW9K677pLz4uVs3LjRSqNRakr6119/+R1nyJAhVpoYfHRt3717dyvNDU477TS5rgsuuMBKcoO///7bv2eU2bNn2xpHJmge5Mgjj7SS7PDrr7/6z2jatGlWGp1SU9LddttNLuqGG26wksTQ+fVLHHzwwVaaGzzzzDNyXfvuu6+V5A716tXz79v9999vpY5MOeqoo+ReZjNcYLqFKUfOe8IJJ1hpemRdSVetWuV3nIYNG1ppYgYMGOC3p7z77ru2ZsfzxhtvyDXts88+crNziSuuuMK/Z3QuR0k6dOjg7bLLLt6pp56acr540qRJci/PO+88K8kOn332mczxc+5Mk6BZV1LtOJTNmzdbaXwGDRok7TQOaNu2ra3Z8WzYsMH/HmTlcomrr77av7Y6depYae7z2GOPyeIUwgcy9xpLn3LKKd7JJ58s8oEDB3pDhw71iouL7afSB6XkvPyNlStXWmliCBsYiPnM559/bqXZ4dlnn5Xzzpo1y0rSJ6tKiuXkgihkaZNx9913S7sZM2Z4559/vuznEocccohcE1MuuUTfvn39e1y1alUrzW2I8fSaq1Wr5rVr104G5Msvv9wbPny4N3jwYO/xxx/3Hn30Ue+yyy7z27766qv2DKlZv369d+211/qffe+992xNanr37i2fwVhkA/725MmTJRdTu3ZtOTcD0H777ec999xztlV0sqYZ+++/v3+DmAdKBokh2jGVQRaN/XQeSGlz5ZVXyjUdccQRVpIbvPjii/49pnz00Ue2JreZO3euN2fOHHsUjUqVKnmtWrWyR8m54447/HvyyiuvWGk08PbwRvjsvHnzrDR98Lzq1q0r59ljjz28Aw880PcUUE68iA8++MC2To+sKGnz5s3lYvbcc0/ZPv3007amJIyatPnkk0+8FStWyH4urSqaP3++XFO2RtVsEXS/KW+++aat2fnQRCKLWpKBFdb7QeiUCVhzPs8Uyfbw4YcfivVUioqKxN3Gc9jeBTnbpaR0HC7ioIMOkuOePXvKF06ELgbQUZVMLsecJ126deuW9aVvuvCZku3YZHvRaSBKri2myBZTpkzxv2OyQYjFGxpanXvuuVaaPqzK0r/39ddfW2l86LNYd21PUjEROidKue+++6w0czJWUlwDLkJdWx3VEpl0XQs5ZswYOcYt4TjTEez555/3HnnkEXuUHQ4//HC5pkxT5aXF0qVL5booL7/8spXuHDC32759e//7XXXVVd73339va7eF+cZjjz1W2p1xxhlyvD20adNGzoWRSZT9pV/jrtIOlxV4e6Vx48ayH0a9Sk1EYVHjsXDhQhlgjjnmGDF0LHI455xz5PuTyAqS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`
                      }
                    ]
                  },
                  {
                    columns: [
                      {
                        alignment: 'center',
                        text: '____________________________________________________\n'+'Michael Zuleta\n'+'Propietario de Jireh PC'
                      }
                    ]

                  }
                );
                },
            },
        ]
  });
}

</script>
