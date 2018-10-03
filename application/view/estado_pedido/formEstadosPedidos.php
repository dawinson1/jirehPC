<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Registro Estado para Pedidos</h3>
            </div>
            <form autocomplete="off">
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="nomEstadoPedido">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre del Nuevo Estado"
                        name="nomEstadoPedido" id="nomEstadoPedido" maxlength="20" >

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="registrarEstadoPedido()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>
          </div>

<script>
        function registrarEstadoPedido(){
        var patron = /[0-9]/;  // cree la expresion regular y lo guarde en la variable patron.
        var nombreEstado = $('#nomEstadoPedido').val();

        var length_nombre = $('#nomEstadoPedido').val().length;

        var Max_LengthNombre = 20;



        if ((nombreEstado == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        }
        else if (patron.test(nombreEstado)){ 
//sintaxis para validar que el campo no contenga números. 
//patron es la experesion regular, dentro del .test() se pone la variable a comparar
            swal("Upss", "No se permite ingresar números!", "error");
        }else if (length_nombre>Max_LengthNombre) {
      swal("Upss", "Nombre solo debe tener Máximo 20 caracteres!", "error");
         }
        
        else {
            $.ajax({
                url: Url+'estado_pedido/crearEstadoPedido',
                type:'POST',
                data:{
                nomEstPedido: nombreEstado,
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#nomEstadoPedido').val('');
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }

            

    }

</script>