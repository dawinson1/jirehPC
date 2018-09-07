<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Registrar  Tipo de Movimiento</h3>
            </div>
            <form autocomplete="off">
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nomTipoM">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre del Nuevo Tipo de Movimiento"
                        name="nomTipoM" id="nomTipoM">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="crearTipoMov()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>
          </div>

<script>
        function crearTipoMov(){
        var patron = /[0-9]/;  // cree la expresion regular y lo guarde en la variable patron.
        var nombreTM = $('#nomTipoM').val();


        if ((nombreTM == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        }
        else if (patron.test(nombreTM)){ 
//sintaxis para validar que el campo no contenga números. 
//patron es la experesion regular, dentro del .test() se pone la variable a comparar
            swal("Upss", "No se permite ingresar números!", "error");
        }else {
            $.ajax({
                url: Url+'tipo_de_movimiento/crearTipoMov',
                type:'POST',
                data:{
                    nomTipoM: nombreTM,
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#nomTipoM').val('');
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }

            

    }

</script>
