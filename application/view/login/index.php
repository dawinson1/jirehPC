<body background="<?php echo URL; ?>img/Azul.jpg">
<div class="login-box">
  <div class="login-logo">
    <a href="#">
    <h2 style="color:white; font-size:120%; text-shadow: 3px 3px black;"><b>Jireh</b> PC</h2>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius: 15px;">
    <p class="login-box-msg">Inicia sesión para comenzar</p>

    <form action="" method="" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Escriba su cédula" onkeypress="process(event, this)" id="CCoNIT" name="CCoNIT" maxlength="14">
        <span class="fa fa-address-card form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback input-group"> <!--comienzo div del inputt-->
          <input type="password" class="form-control" placeholder="Ingrese su contraseña" onkeypress="process(event, this)"
              name="passlog" id="passlog">

              <span class="input-group-btn">
                <button type="button" class="btn btn-light btn-flat" id="ver-pass"><i class="fa fa-eye" id="icon"></i></button>
              </span>

      </div><!--cierre div del inputt-->
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="start()" class="btn btn-primary">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
    <a href="<?php echo URL; ?>login/recuPass">He olvidado mi contraseña</a><br>
    <a onclick="crearCliente()" href="#" class="text-center">Registra cuenta nueva</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="modal fade" id="myModal" role="dialog"> <!--Div que contiene VENTANA MODAL DE REGISTRO DE CLIENTE-->
<div class="modal-dialog">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Registrar Cliente</h3>
            </div>
            <form>
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="identificador" >Cédula</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número de cedula o el NIT de la empresa"
                            name="identificador" id="identificador" maxlength="14">

                        <div class="input-group-addon"> <!--Este div es opcional, servirá cuando queramos que en frente del input este otro icono-->
                        <i class="glyphicon glyphicon-search"></i>
                        </div> <!--Cierre del div opcional-->

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="nomCliente">Nombre</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus nombres"
                        name="nomCliente" id="nomCliente" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="apeCliente">Apellido</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos"
                        name="apeCliente" id="apeCliente" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="correoCliente">Correo</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="example@domain.com"
                         name="correoCliente" id="correoCliente" maxlength="29">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="direcCliente">Dirección</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese la direccion de su hogar"
                        name="direcCliente" id="direcCliente" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="telCliente">Teléfono</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese su número teléfonico"
                        name="telCliente" id="telCliente" maxlength="14">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->
                

                    <div class="form-group " id="alertPass"> <!--Comienzo del div contenedor del input-->
                             <label for="passCliente">Contraseña</label>

                             <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                              <span class="input-group-addon"><i class="fa fa-key"></i></span>
                         <input type="password" class="form-control" placeholder="Ingrese su Contraseña" autocomplete="off"
                              name="passCliente" id="passCliente" maxlength="15">

                         <span class="input-group-btn">
                           <button type="button" class="btn btn-light btn-flat" id="ver-pass2"><i class="fa fa-eye" id="icon"></i></button>
                         </span>

              </div><!--cierre div del input-->
            </div>


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="registrarCliente()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>

</div>
</div>









<script>
// para que se pueda ejecutar esta función kis inputs deben tener este comando onkeypress="process(event, this);
function process(e) { // función que detecta si se preciona enter o intro y ejecuta la función start();
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) { //Enter keycode
        start();
    }
}

function start(){
  var id_user = $('#CCoNIT').val();
  var contrasena = $('#passlog').val();

  if ((id_user == "") || (contrasena == "")) { //Valida si los campos estan vacios
      swal("Upss", "Los campos no pueden ir vacíos!", "error");
  } else {
      $.ajax({
          url: Url+'login/inicioSesion',
          type:'POST',
          data:{identificador: id_user,
          pass: contrasena
          }
      }).done(function(data){
        if(data==1){
          location.href = Url+'producto';
        }
        if(data==2){
          swal("Upss", "Usuario y/o Contraseña no son correctos!", "error");
        }
      })
  }
}

$(function(){
  $("#ver-pass").mouseup(function(){//#ver-pass es el id del boton, al soltarlo el hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye');//cambiará la clase del icono
        $("#passlog").prop('type', 'password');//cambiará el type al input
    });
    $("#ver-pass").mousedown(function(){ //#ver-pass es el id del boton al dejar presionado hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye-slash');//cambiará la clase del icono
        $("#passlog").prop('type', 'text');//cambiará el type al input

    });
})


$(function(){
  $("#ver-pass2").mouseup(function(){//#ver-pass es el id del boton, al soltarlo el hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye');//cambiará la clase del icono
        $("#passCliente").prop('type', 'password');//cambiará el type al input
    });
    $("#ver-pass2").mousedown(function (){ //#ver-pass es el id del boton al dejar presionado hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye-slash');//cambiará la clase del icono
        $("#passCliente").prop('type', 'text');//cambiará el type al input

    });
})


// REGISTRO VENTANA MODAL.//

function registrarCliente(){
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
  var estCliente = 1;
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
    } else if (estCliente == 0) {
      swal("Upss", "No has seleccionado un estado!", "error");
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
        rolCliente: rolCliente,
        estCli: estCliente
        }
      }).done(function(data){
          if(data){
            swal("Bien Hecho!", "Se ha registrado exitosamente!", "success");
            $('#identificador').val('');
            $('#nomCliente').val('');
            $('#apeCliente').val('');
            $('#correoCliente').val('');
            $('#direcCliente').val('');
            $('#telCliente').val('');
            $('#passCliente').val('');
            $('#id_estado').val(0);
            $("#myModal").modal("hide");
          }else{
              swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
            }
          })
        }
}


function crearCliente() //funcion plasmar los datos del usuario en los inputs
{
 
   $("#myModal").modal("show");
}


</script>
