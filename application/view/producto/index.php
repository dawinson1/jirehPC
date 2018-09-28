<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <b class="box-title">Productos</b>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="tableProducto" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>Referencia</th>
                  <th>Categoria</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Stock</th>
                  <th>Precio Unitario</th>
                  <th>Marca</th>
                  <th>Editar</th>
                  <th>Imagen</th>
                  <th>Actualizar Imagen</th>
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
              <h3 class="box-title">Editar Producto</h3>
            </div>
            <form>
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Referencia</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Referencia del Producto"
                            name="identificador" id="identificador">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nomCat">Categoria</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Categoria del Producto"
                        name="nomCat" id="nomCat">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="prodNom">Producto</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Nombre del Producto"
                        name="prodNom" id="prodNom">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="cantPro">Cantidad</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Cantidad de Productos"
                         name="cantPro" id="cantPro">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="stockPro">Stock</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Muestra Cantidad en bodega"
                        name="stockPro" id="stockPro">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="preUni">Precio Unitario</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Precio Unitario del Producto"
                        name="preUni" id="preUni">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nMarc">Marca</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese marca del Producto" autocomplete="off"
                        name="nMarc" id="nMarc">

                    </div><!--cierre div del input-->
                </div> <!--cierre del div contenedor del input-->

              </div>

              <div class="col-md-6">

                          <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                            <div class="form-group"> <!--Comienzo del div contenedor del input-->
                                <label for="imgProdu" >Seleccione imagen del Producto</label>

                                <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->

                                    <input type="file" class="form-control"
                                        name="imgProdu" id="imgProdu">

                                </div><!--cierre div del inputt-->
                            </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="enviarEditProducto()">Modificar</button>
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
              <h3 class="box-title">Actualizar imagen del Producto</h3>
            </div>
            <form autocomplete="off" enctype="multipart/form-data" id="actImgProduct">
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

              <div class="form-group hidden" id="DivInputImg"> <!--Comienzo del div contenedor del input-->
                  <label for="refProdImg" >Referencia</label>

                  <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control"
                          name="refProdImg" id="refProdImg">

                  </div><!--cierre div del inputt-->
              </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                                <label for="imgProdu" >Seleccione imagen del Producto</label>
                    

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->

                        <input type="file" class="form-control"
                            name="imgProdu" id="imgProdu">

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
        tabla =	$('#tableProducto').DataTable( {
        "ajax": {
            "url": Url+'/producto/listarProducto',
            "type": "GET",
            "dataSrc": "",
            "deferRender": true
        },
        "columns": [
            { "data": "Referencia","className": 'centeer'  },
            { "data": "Categoria","className": 'centeer'  },
            { "data": "Producto","className": 'centeer'  },
            { "data": "Cantidad","className": 'centeer'  },
            { "data": "Stock","className": 'centeer' },
            { "data": "Precio Unitario", "className": 'centeer' },
            { "data": "Marca", "className": 'centeer' },
            { "data": "Editar", "orderable": false  },
            { "data": "Imagen", "render":function(data,type,row){
              return '<center><img src="<?php echo URL; ?>'+data+'" width="120" height="80" /></center>';
              }
            },
            { "data": "Actualizar Imagen", "orderable": false  },
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

function enviarEditProducto() //funcion para enviar los cambios al controlador
{
        var referencia = $('#identificador').val();
        var id_categoria = $('#nomCat').val();
        var nombreProducto = $('#prodNom').val();
        var cantidad = $('#cantPro').val();
        var stock = $('#stockPro').val();
        var precioUnit = $('#preUni').val();
        var marca = $('#nMarc').val();

        if ((referencia == "") || (id_categoria == "") || (nombreProducto == "") || (cantidad == "")  || (stock == "") || (precioUnit == "")  ) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");

        } else {
            $.ajax({
                url: Url+'/producto/editarProduct',
                type:'POST',
                data:{identificador: referencia,
                    nomCat: id_categoria,
                    prodNom: nombreProducto,
                    cantPro: cantidad,
                    stockPro: stock,
                    preUni: precioUnit,
                    nMarc: marca,
                    
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#identificador').val('');
                    $('#nomCat').val('');
                    $('#prodNom').val('');
                    $('#cantPro').val('');
                    $('#stockPro').val('');
                    $('#preUni').val('');
                    $('#nMarc').val('');
                    $("#myModal").modal("hide");
                    //setTimeout('location.reload()',2000);
                    tabla.ajax.reload(null,false);
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }
}

function actuaImg() //funcion para enviar los cambios al controlador
{
  var datosimg = new FormData($('#actImgProduct')[0]);
  console.log(datosimg)

      $.ajax({
          url: Url+'/producto/editarImgProducto',
          type:'POST',
          data: datosimg,
          contentType: false,
          processData: false,
        }).done(function(data){
          if (data=='Error Archivo') {
            swal("Algo anda mal!", "Es posible que la imagen este dañada!", "error");
          }
          if (data=='img no permitida') {
            swal("¿Que haces?", "Este formato no esta permitido!", "error");
          }
          if (data=='La imagen ya existe') {
            swal("Wow", "Esta imagen ya existe! Intenta cambiarle el nombre a tu archivo.", "error");
          }
          if (data=='Error al guardar imagen') {
            swal("Lo sentimos :(", "Hubo un error al guardar la imagen", "error");
          }
          if (data==1) {
            swal("Bien Hecho!", "La imagen  ha sido actualizada!", "success");
            $('#refProdImg').val('');
            $('#imgProdu').fileinput('clear');
            $("#myModalFile").modal("hide");
            tabla.ajax.reload(null,false);
          }

          })
}


function showModalImg(idC) //funcion plasmar los datos del usuario en los inputs
{
  $('#idClientMimg').val(idC);
  //document.getElementById("idClientMimg").disabled = true;
  $('#DivInputImg').hide();
  $("#myModalFile").modal("show");
}

function editarProducto(ref,nomCate,nomPr,cant,stck,price,brand) //funcion plasmar los datos del usuario en los inputs
{
  $('#identificador').val(ref);
  $('#id_categoria').val(nomCate);// revisar para poner el nombre y no el id.
  $('#nombreProducto').val(nomPr);
  $('#cantidad').val(cant);
  $('#stock').val(stck);
  $('#precioUnit').val(price);
  $('#marca').val(brand);
  document.getElementById("identificador").disabled = true;
  $("#myModal").modal("show");
}

$('#imgProdu').fileinput({
        theme: 'fa',
        language: 'es',
        showUpload : false,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
    });

function eliminarProducto(ref) {
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
            url:Url+'/producto/eliminarProducto',
            type:'POST',
            data:{identificador:ref}
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
</script>
