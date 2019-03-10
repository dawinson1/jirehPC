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
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Stock</th>
                  <th>Precio Unitario</th>
                  <th>Marca</th>
                  <th>Estado</th>
                  <th>Imagen</th>
                  <th>Editar</th>
                  <th>Actualizar Imagen</th>
                  <th>Cambiar estado <br> Activo/Inactivo</th>
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
            <form  enctype="multipart/form-data" id="modalEditProducto">
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group col-md-6" id="idReferenciaP"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Referencia</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Referencia del Producto"
                            name="identificador" id="identificador" maxlength="29" >

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="selectCat">Categoria</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <select id="selectCat" class="form-control" name="selectCat"></select>
                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="prodNom">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Nombre del Producto"
                        name="prodNom" id="prodNom" maxlength="24" >

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="cantPro">Cantidad</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Cantidad de Productos"
                         name="cantPro" id="cantPro"  maxlength="11" >


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="stockPro">Stock</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Muestra Cantidad en bodega"
                        name="stockPro" id="stockPro"  maxlength="11">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="preUni">Precio Unitario</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Precio Unitario del Producto"
                        name="preUni" id="preUni"  maxlength="11">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nMarc">Marca</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <select id="nMarc" class="form-control" name="nMarc"></select>
                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

              </div>


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
            { "data": "Nombre","className": 'centeer'  },
            { "data": "Cantidad","className": 'centeer'  },
            { "data": "Stock","className": 'centeer' },
            { "data": "Precio Unitario", "className": 'centeer' },
            { "data": "Marca", "className": 'centeer' },
            { "data": "EstadoProd", "className": 'centeer' },
            { "data": "Imagen", "render":function(data,type,row){
              return '<center><img src="<?php echo URL; ?>'+data+'" width="120" height="80" /></center>';
              }
            },
            { "data": "Editar", "orderable": false  },
            { "data": "Actualizar Imagen", "orderable": false  },
            { "data": "Eliminar", "orderable": false, "render": function(data, type, full, meta){

              return data;
              }
            }
        ],
        "lengthMenu": [[5, 10, 15, 100, -1], [5, 10, 15, 100, "Todo"]],
        "scrollX": false,
        "fnDrawCallback": function() {
          // $('.toggle-Producto').bootstrapToggle('destroy')
          $('.toggle-Producto').bootstrapToggle();
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

function enviarEditProducto() //funcion para enviar los cambios al controlador
{

var patronNum = /[0-9]/;
var patronLetrEspecial = /\D/;
var patronSoloLetr = /[^A-Za-z ]/;
var Max_LengthReferencia = 29;
var Max_LengthNombre = 24;
var Max_LengthCantidad = 11;
var Max_LengthMarca = 20;


var referencia = $('#identificador').val();
var Max_referencia = $('#identificador').val().length;
var id_categoria = $('#selectCat').val();
var nombreProducto = $('#prodNom').val();
var Max_nombreProducto = $('#prodNom').val().length;
var cantidad = $('#cantPro').val();
var Max_Cantidad = $('#cantPro').val().length;
var stock = $('#stockPro').val();
var Max_Stock = $('#stockPro').val().length;
var precioUnit = $('#preUni').val();
var Max_PrecioU = $('#preUni').val().length;
var marca = $('#nMarc').val();
var Max_Marca = $('#nMarc').val().length;

if ((referencia == "") || (id_categoria == "") || (nombreProducto == "") || (cantidad == "") || (stock == "") || (precioUnit == "") || (marca == "")) {
    swal("Upss!", "Los campos no pueden ir vacíos!", "error");
} else if (patronLetrEspecial.test(cantidad)) {
    swal("Upss!", "En el campo Cantidad solo deben ir números!", "error");
}
else if (patronLetrEspecial.test(stock)) {
    swal("Upss!", "En el campo Stock solo deben ir números!", "error");
}
else if (patronLetrEspecial.test(precioUnit)) {
    swal("Upss!", "En el campo Precio Unitario solo deben ir números!", "error");
}
else if (patronNum.test(marca)) {
    swal("Upss!", "En el campo Marca solo deben ir Letras!", "error");
}
else if ((Max_referencia > Max_LengthReferencia) ||(Max_nombreProducto > Max_LengthNombre) || (Max_Cantidad > Max_LengthCantidad) || (Max_Stock > Max_LengthCantidad) || (Max_PrecioU > Max_LengthCantidad) || (Max_Marca > Max_LengthMarca)) {
    swal("Upss!", "Ingresaste una longitud no válida en un campo!", "error");
} else {

    $.ajax({
        url: Url+'/producto/editarProduct',
        type:'POST',
        data: {identificador: referencia,
                selectCat: id_categoria,
                prodNom: nombreProducto,
                cantPro: cantidad,
                stockPro: stock,
                preUni: precioUnit,
                nMarc: marca
        }
    }).done(function(data){
        if(data){
            swal("Bien Hecho!", "El Registro ha sido completado!", "success");
            $('#identificador').val('');
            $('#selectCat').val('');
            $('#prodNom').val('');
            $('#cantPro').val('');
            $('#stockPro').val('');
            $('#preUni').val('');
            $('#nMarc').val('');
            $("#myModal").modal("hide");
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
          url: Url+'/producto/actImgProducto',
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


function showModalImg(ref) //funcion plasmar los datos del usuario en los inputs
{
  $('#refProdImg').val(ref);
  //document.getElementById("refProdImg").disabled = true;
  $('#DivInputImg').hide();
  $("#myModalFile").modal("show");
}

function editarProducto(ref,nomCate,nomPr,cant,stck,price,brand) //funcion plasmar los datos del usuario en los inputs
{
  $('#identificador').val(ref);
  $('#selectCat').val(nomCate);// revisar para poner el nombre y no el id.
  $('#prodNom').val(nomPr);
  $('#cantPro').val(cant);
  $('#stockPro').val(stck);
  $('#preUni').val(price);
  $('#nMarc').val(brand);
  //document.getElementById("identificador").disabled = true;
  $("#idReferenciaP").hide();
  $("#myModal").modal("show");







}
//select ventana modal categoria
$(function(){
listarSelectMarcs()
listarSelectCat();
})


function listarSelectCat() {
  $.ajax({
     url:Url+'/producto/listarCategoria',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var selectCat = '';
     data.forEach(function(c){
        selectCat+='<option value='+c.id_categoria+'>'+c.Nombre+'</option>';
     })
     $('#selectCat').empty();
     $('#selectCat').html('<option value="" selected="selected"></option>');
     $('#selectCat').append(selectCat);
 })
}

function listarSelectMarcs() {
  $.ajax({
     url:Url+'/producto/listarMarca',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var selectMarc = '';
     data.forEach(function(m){
        selectMarc+='<option value='+m.idmarca+'>'+m.Nombre+'</option>';
     })
     $('#nMarc').empty();
     $('#nMarc').html('<option value="" selected="selected"></option>');
     $('#nMarc').append(selectMarc);
 })
}





$('#imgProdu').fileinput({
        theme: 'fa',
        language: 'es',
        showUpload : false,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});

function changeStatusProd(idEst, idProd) {
  // $('#toggleProd_'+idProd+'').change(function() {
    // var NewEstado= '';
      // if (idEst == 1) {
      //   NewEstado = 2;
      //   $.ajax({
      //     url: Url+'/producto/cambiarEstadoProd',
      //     type:'POST',
      //     data: {idProducto: idProd,
      //       idEstEmp: NewEstado
      //     }
      //     }).done(function(data){
      //       tabla.ajax.reload(null,false);
      //     })
      // } else if (idEst == 2) {
        // NewEstado = 1;
        $.ajax({
          url: Url+'/producto/cambiarEstadoProd',
          type:'POST',
          data: {idProducto: idProd,
            idEstEmp: idEst
          }
          }).done(function(data){
            tabla.ajax.reload(null,false);
          })
      // }
    // })
}
</script>
