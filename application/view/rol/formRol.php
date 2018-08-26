<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Registrar Rol</h3>
            </div>
            <form>
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="Nombre">Nombre Rol</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre del Nuevo Rol"
                        name="Nombre" id="Nombre">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="crearRol()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>
          </div>

<script>
        function crearRol(){
        var patron = /[0-9]/;  // cree la expresion regular y lo guarde en la variable patron.
        var Nombre = $('#Nombre').val();


        if ((Nombre == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        }
        else if (patron.test(Nombre)){ 
//sintaxis para validar que el campo no contenga números. 
//patron es la experesion regular, dentro del .test() se pone la variable a comparar
            swal("Upss", "No se permite ingresar números!", "error");
        }else {
            $.ajax({
                url: Url+'rol/crearRol',
                type:'POST',
                data:{
                    Nombre: Nombre,
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#nomEstado').val('');
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }

            

    }

</script>
