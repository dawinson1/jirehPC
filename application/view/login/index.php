<body background="<?php echo URL; ?>img/Azul.jpg">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Jireh</b>PC</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicia sesión para comenzar</p>

    <form action="" method="" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Escriba su cédula" onkeypress="process(event, this)" id="CCoNIT" name="CCoNIT" maxlength="14">
        <span class="fa fa-address-card form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Ingrese su contraseña" onkeypress="process(event, this)" id="passlog" name="passlog" maxlength="15">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
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
    <a href="#" class="text-center">Registra cuenta nueva</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
                location.href = Url+'cliente';
              }
              if(data==2){
                swal("Upss", "Usuario y/o Contraseña no son correctos!", "error");
              }
            })
        }
    }
</script>
