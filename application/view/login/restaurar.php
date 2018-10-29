<body background="<?php echo URL; ?>img/Azul.jpg">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Jireh</b>PC</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form action="" method="" autocomplete="off">
      <div class="form-group newPassInput has-feedback">
        <input type="password" class="form-control" placeholder="Digite su nueva contraseña"
        onkeypress="process(event, this)" id="pass1" name="pass1" maxlength="15">
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="form-group newPassInput has-feedback">
        <input type="password" class="form-control" placeholder="Vuelve a escribir su contraseña"
        onkeypress="process(event, this)" id="pass2" name="pass2" maxlength="15">
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="form-group has-error">
        <span class="help-block" id="alertsNewPass"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="newPass()" class="btn btn-primary">Guardar Contraseña</button>
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
function process(e) { // función que detecta si se preciona enter o intro y ejecuta la función start();
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) { //Enter keycode
        newPass();
        e.preventDefault();
    }
}

function newPass(){
        var tokenUser = "<?php echo $token ?>";
        var contrasena1 = $('#pass1').val();
        var contrasena2 = $('#pass2').val();

        var Min_Lengthpass = 8;
        var Max_Lengthpass = 15;
        var pass1Length = $('#pass1').val().length;
        var pass2Length = $('#pass2').val().length;

        if ((contrasena1 == "") || (contrasena2 == "")) { //Valida si los campos estan vacios
          $('#alertsNewPass').text('El campo no puede ir vacío');
          $('.newPassInput').addClass('has-error');
        } else if ((pass1Length>Max_Lengthpass) || (pass2Length>Max_Lengthpass) ||
        (pass1Length<Min_Lengthpass) || (pass2Length<Min_Lengthpass)) {
          $('#alertsNewPass').text('La contraseña debe tener como mínimo 8-15 caracteres');
          $('.newPassInput').addClass('has-error');

        } else if (!(contrasena1 == contrasena2)) {
          $('#alertsNewPass').text('Las contraseñas no coinciden');
          $('.newPassInput').addClass('has-error');
        } else {
          $('#alertsNewPass').text('');
          $('.newPassInput').removeClass('has-error')
            $.ajax({
                url: Url+'login/restorePass',
                type:'POST',
                data:{newPass: contrasena1,
                tokenUser: tokenUser

               }
            }).done(function(data){
              if (data=='Update success') {
                swal("Felicidades","Su contraseña se ha actualizado correctamente", "success");
                $('#pass1').val('');
                $('#pass2').val('');
              }
              if (data=='Delete Token Error') {
                $('#alertsNewPass').text('Hubo un error al eliminar el token');
              }
              if (data=='error al actualizar') {
                $('#alertsNewPass').text('Hubo un error al actualizar su contraseña');
              }
              if (data=='emailError') {
                $('#alertsNewPass').text('Hubo un error con el correo');
              }
              if (data=='expiration token') {
                $('#alertsNewPass').text('Lo sentimos, ya habías restaurado su contraseña con ese link');
              }
            })
        }
    }

    $(function(){
      buscarUser();
    })

    function buscarUser() {
      var EmailUser = "<?php echo $emailUser ?>";
      var tokenUser = "<?php echo $token ?>";

      $.ajax({
          url: Url+'login/BuscarUser',
          type:'POST',
          data:{EmailUser: EmailUser,
            tokenUser: tokenUser
         }
      }).done(function(data){
        if (data=='no encontro datos') {
          location.href = Url+'login';
        }
        if (data=='email no coincide') {
          location.href = Url+'login';
        }
      })
    }
</script>
