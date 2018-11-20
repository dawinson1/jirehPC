<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Clientes</h3>
            </div>
            <form enctype="multipart/form-data" autocomplete="off">
            <div class="box-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group col-xs-6" id="alertID"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Cédula o NIT</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número de cédula o el NIT de la empresa"
                            name="identificador" id="identificador" maxlength="14">

                    </div><!--cierre div del inputt-->

                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6" id="alertNom"> <!--Comienzo del div contenedor del input-->
                    <label for="nomCliente">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus nombres"
                        name="nomCliente" id="nomCliente" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6" id="alertApe"> <!--Comienzo del div contenedor del input-->
                    <label for="apeCliente">Apellido</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos"
                        name="apeCliente" id="apeCliente" maxlength="24">

                    </div><!--cierre div del inputt-->

                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6" id="alertEmail"> <!--Comienzo del div contenedor del input-->
                    <label for="correoCliente">Correo</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="example@domain.com"
                         name="correoCliente" id="correoCliente" maxlength="29">

                    </div><!--cierre div del inputt-->

                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6" id="alertDicc"> <!--Comienzo del div contenedor del input-->
                    <label for="direcCliente">Dirección</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Ejemplo: Cra o Clle 21 #45-55"
                        name="direcCliente" id="direcCliente" maxlength="24">

                    </div><!--cierre div del inputt-->

                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6" id="alertTel"> <!--Comienzo del div contenedor del input-->
                    <label for="telCliente">Teléfono</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número teléfonico"
                        name="telCliente" id="telCliente" maxlength="14">

                    </div><!--cierre div del inputt-->

                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6" id="alertPass"> <!--Comienzo del div contenedor del input-->
                    <label for="passCliente">Contraseña</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Ingrese su Contraseña" autocomplete="off"
                        name="passCliente" id="passCliente" maxlength="15">

                        <span class="input-group-btn">
                          <button type="button" class="btn btn-light btn-flat" id="ver-pass"><i class="fa fa-eye" id="icon"></i></button>
                        </span>

                    </div><!--cierre div del input-->

                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="registrar()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>
          </div>

<script>
function registrar(){
  var patronNum = /[0-9]/;
  var patronLetrEspecial = /\D/;
  var patronSoloLetr = /[^A-Za-záéíóúüñ ]/;
  var patronCorreo = /\w+@\w+\.+[a-z]/;

  var Max_LengthIDtTel = 14;
  var Max_LengthNomsDicc = 24;
  var Max_LengthEmail = 29;
  var Max_Lengthpass = 15;
  var Min_Lengthpass = 8;

  var length_id_cliente = $('#identificador').val().length;
  var length_nombreCliente = $('#nomCliente').val().length;
  var length_apellidoCliente = $('#apeCliente').val().length;
  var length_correoCliente = $('#correoCliente').val().length;
  var length_telefono = $('#telCliente').val().length;
  var length_contrasena = $('#passCliente').val().length;

  var id_cliente = $('#identificador').val();
  var nombreCliente = $('#nomCliente').val();
  var apellidoCliente = $('#apeCliente').val();
  var correoCliente = $('#correoCliente').val();
  var direccionCliente = $('#direcCliente').val();
  var telefono = $('#telCliente').val();
  var contrasena = $('#passCliente').val();
  var imgClient = 'img/TedDefault.jpg';
  var rolCliente = 'Usuario';

  if ((id_cliente == "") || (nombreCliente == "") || (apellidoCliente == "") || (correoCliente == "") || (direccionCliente == "") ) { //Valida si los campos estan vacios
    swal("Upss", "Los campos no pueden ir vacios!", "error");

  } else if (patronLetrEspecial.test(id_cliente)){
//sintaxis para validar que el campo no contenga números. patron es la experesion regular, dentro del .test() se pone la variable a comparar
    //$( "#alertID" ).addClass( "has-error" );
    swal("Upss", "No se permite ingresar letras y/o caracteres especiales!", "error");

  }else if (patronSoloLetr.test(nombreCliente)){

      swal("Upss", "No se permite ingresar números y/o caracteres en el campo Nombre!", "error");

    } else if (patronSoloLetr.test(apellidoCliente)){

      swal("Upss", "No se permite ingresar números y/o caracteres en el campo Apellido!", "error");

    } else if (!patronCorreo.test(correoCliente)){

      swal("Upss", "El correo ingresado no es válido!", "error");

    } else if (patronLetrEspecial.test(telefono)){

      swal("Upss", "El teléfono ingresado no es válido!", "error");

    } else if ((length_id_cliente>Max_LengthIDtTel) || (length_nombreCliente>Max_LengthNomsDicc) ||
      (length_apellidoCliente>Max_LengthNomsDicc) || (length_correoCliente>Max_LengthEmail) ||
      (length_telefono>Max_LengthIDtTel)) {
        swal("Upss", "Has ingresado una longitud no válida!", "error");
    }else if ((length_contrasena>Max_Lengthpass) || (length_contrasena<Min_Lengthpass)) {
      swal("Upss", "La contraseña debe tener como mínimo 8-15 caracteres!", "error");
    } else{
      //$( "#alertID" ).removeClass( "has-error" );
    $.ajax({
        url: Url+'/cliente/crearCliente',
        type:'POST',
        data:{identificador: id_cliente,
        nomCliente: nombreCliente,
        apeCliente: apellidoCliente,
        correoCliente: correoCliente,
        direcCliente: direccionCliente,
        telCliente: telefono,
        passCliente: contrasena,
        perfilClient: imgClient,
        rolCliente: rolCliente
        }
      }).done(function(data){
          if(data){
            swal("Bien Hecho!", "El Registro ha sido completado!", "success");
            $('#identificador').val('');
            $('#nomCliente').val('');
            $('#apeCliente').val('');
            $('#correoCliente').val('');
            $('#direcCliente').val('');
            $('#telCliente').val('');
            $('#passCliente').val('');
          }else{
              swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
            }
          })
        }
}

$(function(){
  $("#ver-pass").mouseup(function(){//#ver-pass es el id del boton, al soltarlo el hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye');//cambiará la clase del icono
        $("#passCliente").prop('type', 'password');//cambiará el type al input
    });
    $("#ver-pass").mousedown(function(){ //#ver-pass es el id del boton al dejar presionado hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye-slash');//cambiará la clase del icono
        $("#passCliente").prop('type', 'text');//cambiará el type al input

    });
})
</script>
