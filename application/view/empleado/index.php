<div class="content-wrapper">
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
            <table id="tableEmpleado" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Elimar</th>
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
        tabla =	$('#tableEmpleado').DataTable( {
        "ajax": {
            "url": Url+'/empleado/listarEmpleado',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            
            { "data": "Nombre","className": 'centeer'  },
            { "data": "apellido","className": 'centeer'  },
            { "data": "telefono","className": 'centeer'  },
            { "data": "correo","className": 'centeer'  },
            { "data": "idEmpleado","className": 'centeer'  },
            { "data": "nombrerol","className": 'centeer' },
            { "data": "Estado", "orderable": false},
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

function eliminarEmpleado(idEmp) {
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