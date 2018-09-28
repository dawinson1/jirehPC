<div class="content-wrapper">
  <center><h3 class="box-title">Registrar Producto</h3></center>
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
                    <label for="prodNom">Nombre</label>

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
        var patronNum = /[0-9]/;
        var patronLetrEspecial = /\D/;
        var patronSoloLetr = /[^A-Za-z ]/;
        

        var referencia = $('#identificador').val();
        var id_categoria = $('#nomCat').val();
        var nombreProducto = $('#prodNom').val();
        var cantidad = $('#cantPro').val();
        var stock = $('#stockPro').val();
        var precioUnit = $('#preUni').val();
        var marca = $('#nMarc').val();
        var Url_imgProduct =  $('#imgProdu').val();

        if ((referencia == "") || (id_categoria == "") || (nombreProducto == "") || (cantidad == "")  || (stock == "") || (Url_imgProduct == "")  ) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");

        }else{

          $.ajax({
                url: Url+'/producto/crearProducto',
                type:'POST',
                data:{identificador: referencia,
                    nomCat: id_categoria,
                    prodNom: nombreProducto,
                    cantPro: cantidad,
                    stockPro: stock,
                    preUni: precioUnit,
                    nMarc: marca,
                    imgProdu: Url_imgProduct
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
</script>
