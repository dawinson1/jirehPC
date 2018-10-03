<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Registrar  Tipo de Movimiento</h3>
            </div>
            <form autocomplete="off">
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nomTipoE">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre del Nuevo Tipo de Entrada"
                        name="nomTipoE" id="nomTipoE" maxlength="20">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="crearTipoEnt()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>
          </div>

<script>
        function crearTipoEnt(){
        var patron = /[0-9]/;  // cree la expresion regular y lo guarde en la variable patron.
        var nombreTE = $('#nomTipoE').val();
        var length_nombre = $('#nomTipoE').val().length;

        var Max_LengthNombre = 20;


        if ((nombreTE == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        }
        else if (patron.test(nombreTE)){ 
//sintaxis para validar que el campo no contenga números. 
//patron es la experesion regular, dentro del .test() se pone la variable a comparar
            swal("Upss", "No se permite ingresar números!", "error");
        }
        else if (length_nombre>Max_LengthNombre) {
      swal("Upss", "Nombre solo debe tener Máximo 20 caracteres!", "error");
         }
        
         else {
            $.ajax({
                url: Url+'tipo_de_entrada/crearTipoEnt',
                type:'POST',
                data:{
                    nomTipoE: nombreTE,
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#nomTipoE').val('');
                   setTimeout("location.href = Url+'tipo_de_entrada'",3000);
                }
                
                else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }

            

    }

</script>
