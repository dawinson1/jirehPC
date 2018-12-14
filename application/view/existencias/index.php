<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <b class="box-title">Entradas</b>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="tablePedidos" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>No. Entradas</th>
                  <th>ID Empleado</th>
                  <th>Fecha de Entrada</th>
                  <th>Tipo de entrada</th>
                  <th>Ver Entrada</th>
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
<div class="modal fade" id="verEntrada" role="dialog"> <!--Div que contiene la ventana modal-->
<div class="modal-dialog" tabindex="-1">

<section class="content modal-content" style="border-radius: 10px;">
  <div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Detalles de la entrada</h3>
            </div>
            <form>
            <div class="box-body modal-body" id=verDetalles> <!--Este Div es contenedor de los imputs-->
              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                  <h4>Entrada No. <span class="entNumber" id="entNumber"></span></h4>
                </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <h5 class="col-md-6"><b>ID Empleado: </b><span class="IDEmple"></span></h5>
                        <h5 class="col-md-6"><b>Nombre: </b><span class="nombreEmple"></span></h5>
                        <h5 class="col-md-6"><b>Fecha Entrada: </b><span class="fechaEntrada"></span></h5>
                        <h5 class="col-md-6"><b>Tipo de Entrada: </b><span class="nomEntrada"></span></h5>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%" id="detalleProductos">
                      <thead>
                        <tr>
                          <th>Referencia</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Motivo</th>
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


<script>

$(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        tabla =	$('#tablePedidos').DataTable( {
        "ajax": {
            "url": Url+'/detalle_entrada/listEntrada',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "id_entrada","className": 'centeer'  },
            { "data": "id_emplo","className": 'centeer'  },
            { "data": "dateEnt","className": 'centeer'  },
            { "data": "nomEnt", "className": 'centeer' },
            { "data": "verEnt", "orderable": false  }
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

function verEntrada(idEntrada,idEmp,nomEmp,dateEnt,nomEnt,totalPed) //funcion para enviar los cambios al controlador
{
  $('.entNumber').text(idEntrada);
  $('.IDEmple').text(idEmp);
  $('.nombreEmple').text(nomEmp);
  $('.fechaEntrada').text(dateEnt);
  $('.nomEntrada').text(nomEnt);
  $.ajax({
      url: Url+'/detalle_entrada/seeOrder',
      type:'POST',
      dataType: "json",
      data: {
        idP: idEntrada
      }
    }).done(function(data){
      var verPedi = '';
      data.forEach(function(vp){
        verPedi += `<tr>
          <td>`+vp.refer+`</td>
          <td>`+vp.nomPro+`</td>
          <td>`+vp.cantSoli+`</td>
          <td>`+vp.motivoEnt+`</td>
        </tr>`;
      })
      pagTabla();
      tablaverPed.rows().remove().draw();
      tablaverPed.rows.add($(verPedi)).draw();
      $('#listadosDetalle').empty();
      $('#listadosDetalle').append(verPedi);
      $('#verEntrada').modal('show');
    })
}

function pagTabla() {
  let numPed = $('#entNumber').text();
  $.fn.dataTable.ext.errMode = 'throw';
  tablaverPed =	$('#detalleProductos').DataTable( {
  "lengthMenu": [[3, 6, 12, 25, -1], [3, 6, 12, 25, "Todo"]],
  "scrollX": false,
  "retrieve": true,
  "paging": true,
   //"dom": 'flrtip',
   responsive: true,
  "language": {
      "url": Url+"/js/lenguaje.json"
  },
  });
}

</script>
