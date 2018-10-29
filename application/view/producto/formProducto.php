<div class="content-wrapper">
  <center><h3 class="box-title">Registrar un nuevo Producto</h3></center>
<section class="content">
<div class="row">

<div class="col-md-12">
<div class="box box-info">

            <form enctype="multipart/form-data" autocomplete="off" id="formProduct">
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->
              <div class="row"> <!--row para poder mover los inputs text y el input file -->

              <div class="col-md-6">

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Referencia</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Referencia del Producto"
                            name="identificador" id="identificador" maxlength="29">

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
                        name="prodNom" id="prodNom" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="cantPro">Cantidad</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Cantidad de Productos"
                         name="cantPro" id="cantPro" maxlength="11">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="stockPro">Stock</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Muestra Cantidad en bodega"
                        name="stockPro" id="stockPro" maxlength="11">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="preUni">Precio Unitario</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Precio Unitario del Producto"
                        name="preUni" id="preUni" maxlength="11">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-md-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nMarc">Marca</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese marca del Producto" autocomplete="off"
                        name="nMarc" id="nMarc" maxlength="20">

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

              </div> <!--cierre div col-md-6-->

            </div> <!-- cierre del div row para mover los inputs -->
            </div> <!--Cierre del Div contenedor-->

            </div>
</div> <!--cierre div col-md-6-->


<div class="col-md-12">

            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="registrar()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->

</div> <!--cierre div col-md-6-->

</div> <!--cierre div row-->
          </section>
          </div>

<!--AJAX-->
<script>
        function registrar(){

        var datosimgProd = new FormData($('#formProduct')[0]);

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
        var Url_imgProduct =  $('#imgProdu').val();

        if ((referencia == "") || (id_categoria == "") || (nombreProducto == "") || (cantidad == "") || (stock == "") || (precioUnit == "") || (marca == "") || (Url_imgProduct == "")) {
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
                url: Url+'/producto/crearProducto',
                type:'POST',
                data: datosimgProd,
                contentType: false,
                processData: false,
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
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })

        }
    }

$('#imgProdu').fileinput({
        theme: 'fa',
        language: 'es',
        showUpload : false,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
    });

$(function(){


listarSelectCat();


})

function listarSelectCat(){
$.ajax({

    url:Url+'/producto/listarCategoria',
    type: 'POST',
    dataType:'json'
}).done(function(data){

    var selectCat = '';
    data.forEach(function(c){

    selectCat+='<option value='+c.id_categoria+'>'+c.Nombre+'</option>';
    })
    $('#selectCat').empty();
    $('#selectCat').html('<option value=""selected="selected"></option>');
    $('#selectCat').append(selectCat);



})

}


</script>
