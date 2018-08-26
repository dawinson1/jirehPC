<body background="<?php echo URL; ?>img/Azul.jpg">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Jireh</b>PC</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicia sesión para comenzarz</p>

    <form action="" method="" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Escrisa su cedula o NIT" id="CCoNIT" name="CCoNIT">
        <span class="fa fa-address-card form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="passlog" name="passlog" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="start()" class="btn btn-primary">Iniciar Sesion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
    <a href="#">He olvidado mi contraseña</a><br>
    <a href="#" class="text-center">Registra cuenta nueva</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
function start(){
        var id_cliente = $('#CCoNIT').val();
        var contrasena = $('#passlog').val();
    
        if ((id_cliente == "") || (contrasena == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        } else {
            $.ajax({
                url: Url+'login/inicioSesion',
                type:'POST',
                data:{identificador: id_cliente,
                passCliente: contrasena
            
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