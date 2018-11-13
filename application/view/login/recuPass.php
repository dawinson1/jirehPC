 <body background="<?php echo URL; ?>img/Azul.jpg">
<div class="login-box">

  <div class="login-logo">
    <a href="#">
    <h2 style="color:white; font-size:120%; text-shadow: 3px 3px black;"><b>Jireh</b> PC</h2>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius: 15px;">
    <p class="login-box-msg">A continuación enviaremos una dirección a su correo para continuar con el proceso de restaurar su contraseña</p>

    <form action="" method="" autocomplete="off">
      <div class="form-group has-feedback" id="emailInput">
        <input type="text" class="form-control" placeholder="Escribe su correo eléctronico" onkeypress="process(event, this)" id="EmailForPass" name="EmailForPass">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-error">
        <span class="help-block" id="alertsRecuPass"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="recu()" class="btn btn-primary">Enviar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
// para que se pueda ejecutar esta función kis inputs deben tener este comando onkeypress="process(event, this);
function process(r) { // función que detecta si se preciona enter o intro y ejecuta la función recu();
    var code = (r.keyCode ? r.keyCode : r.which);
    if (code == 13) { //Enter keycode
        recu();
        r.preventDefault();
    }
}

function recu(){
        var patronCorreo = /\w+@\w+\.+[a-z]/;

        var EmailForPass = $('#EmailForPass').val();

        if (EmailForPass == "") { //Valida si los campos estan vacios
            $('#alertsRecuPass').text('El campo no puede ir vacío');
            $('#emailInput').addClass('has-error');
            //$('#emailInput').removeClass('has-error'); // sintaxis para eliminar una clase
        } else if (!patronCorreo.test(EmailForPass)) {
            $('#alertsRecuPass').text('Haz ingresado un correo no válido');
            $('#emailInput').addClass('has-error');
        } else {
          $('#alertsRecuPass').text('');
          $('#emailInput').removeClass('has-error');
          swal({
            title: "Espere un momento por favor",
            text: " ",
            icon: Url+'img/gif/Loading_icon.gif',
            imageClass: "contact-form-image",
            buttons: false,
          });
            $.ajax({
                url: Url+'login/validarEmail',
                type:'POST',
                data:{EmailForPass: EmailForPass
               }
            }).done(function(data){
              if(data=='Correo no existe'){
                $('#alertsRecuPass').text('El correo ingresado no exíste, intentelo de nuevo');
                $('#emailInput').addClass('has-error');
                swal.close();
              }
              if(data=='Correo Enviado'){
                swal("", "Se ha enviado el enlace a su correo!", "success");
                $('#emailInput').removeClass('has-error');
                $('#EmailForPass').val('');
              }
              if (data=='Error link') {
                $('#alertsRecuPass').text('Lo sentimos,hubo un problema al generar el enlace, trabajaremos en eso.');
                $('#emailInput').removeClass('has-error');
                swal.close();
              }
              if (data=='Error Envio') {
                $('#alertsRecuPass').text('Lo sentimos,hubo un problema al enviar el mensaje a su correo, trabajaremos en eso.');
                $('#emailInput').removeClass('has-error');
                swal.close();
              }
            })
        }
    }
</script>
