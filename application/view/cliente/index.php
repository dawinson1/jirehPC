<div class="content-wrapper">
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
              <table id="tableCliente" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Cedula o NIT</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
                  <th>Contraseña</th>
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
            { "data": "Telefono", "className": 'centeer'},
            { "data": "Contraseña", "className": 'centeer'}
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
</script>