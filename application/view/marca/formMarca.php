<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Registrar Marca</h3>
            </div>
            <form>
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="nomMarca">Nombre Marca</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre de la Marca"
                        name="nomMarca" id="nomMarca"  autocomplete="off" maxlength="25">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="crearMarca()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>
          </div>

<script>
function crearMarca(){
  var patron = /[0-9]/;  // cree la expresion regular y lo guarde en la variable patron.
  var nombreM = $('#nomMarca').val();
  var length_nombre = $('#nomMarca').val().length;
  var Max_LengthNombre = 25;
  var estadoMarca = 1;


    if ((nombreM == "")) { //Valida si los campos estan vacios
      swal("Upss", "Los campos no pueden ir vacios!", "error");
      return false;
    } 
    else if (patron.test(nombreM)){
          //sintaxis para validar que el campo no contenga números.
          //patron es la experesion regular, dentro del .test() se pone la variable a comparar
        swal("Upss", "No se permite ingresar números!", "error");
    }else if (length_nombre>Max_LengthNombre) {
      swal("Upss", "Nombre solo debe tener Máximo 25 caracteres!", "error");
    } else {
      $.ajax({
        url: Url+'marca/crearMarca',
        type:'POST',
        data:{
          nomMarca: nombreM,
          estMarca: estadoMarca
        },
        }).done(function(data){
          if(data){
            swal("Bien Hecho!", "El Registro ha sido completado!", "success");
            $('#nomMarca').val('');
            //location.href = Url+'marca'
          } else {
            swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
          }
        })
    }



    }

</script>
