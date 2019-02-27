<?php
  $uerid = $_SESSION['usid'];
  $uerrl = $_SESSION['Rol'];
 ?>

<script>
$(function(){
  srchd();
})

function srchd() {
  var serid = <?php echo $uerid ?>;
  var serrl = '<?php echo $uerrl ?>';

  $.ajax({
      url: Url+'editPerfil/srchd',
      type:'POST',
      dataType:'json',
      data:{
      serxid: serid,
      serxrl: serrl
     }
  }).done(function(data){

    data.forEach(function(c){
      var rol = c.rolCliente;

      if (rol == 'Usuario') {

        $("#bgtxtName").text(c.nombreCliente+' '+c.apellidoCliente);
        $("#imgusuario").attr("src", Url+c.Url_imgClient);
        $("#txtNom").text(c.nombreCliente);
        $("#txtApe").text(c.apellidoCliente);
        $("#txtTel").text(c.telefono);
        $("#txtDcc").text(c.direccionCliente);
        $("#txtEml").text(c.correoCliente);

      } else {
        $("#bgtxtName").text(c.nombre+' '+c.apellido);
        $("#imgusuario").attr("src", Url+c.Url_imgEmpleado);
        $("#txtNom").text(c.nombre);
        $("#txtApe").text(c.apellido);
        $("#txtTel").text(c.telefono);
        $("#txtEml").text(c.correo);
      }

    })

  })
}

</script>

<div class="content-wrapper" id="carga">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username" id="bgtxtName"></h3>
              <h5 class="widget-user-desc"><?php echo $_SESSION['Rol']; ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" onmouseover="ShowIMgOpctyEdt()" id="imgusuario" src="" alt="User Avatar" style="width: 100px; height:100px;">
            </div>
            <div id="imgOpctyEdt">
              <a href="#" onclick="showModalImg()" class="widget-user-image"><img class="img-circle" onmouseout="normalImg()" style="opacity: 0.5; width: 100px; height:100px;" src="<?php echo URL; ?>img/pencil-60-119100.png" alt="User Avatar"></a>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-center">Configuración general de la cuenta</h4>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="row rownom">
                        <div class="col-sm-4 border-right"><b>Nombre:</b></div>
                        <div class="col-sm-4 border-right nomEdt"><b class="text-muted" id="txtNom"></b></div>
                        <div class="col-sm-4 border-right nomEdt"><a href="#" class="pull-right" onclick="editNom()">Editar</a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row rowape">
                        <div class="col-sm-4 border-right"><b>Apellido:</b></div>
                        <div class="col-sm-4 border-right apeEdt"><b class="text-muted" id="txtApe"></b></div>
                        <div class="col-sm-4 border-right apeEdt"><a href="#" class="pull-right" onclick="editApe()">Editar</a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row rowtel">
                        <div class="col-sm-4 border-right"><b>Teléfono:</b></div>
                        <div class="col-sm-4 border-right telEdt"><b class="text-muted" id="txtTel"></b></div>
                        <div class="col-sm-4 border-right telEdt"><a href="#" class="pull-right" onclick="editTel()">Editar</a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row rowcor">
                        <div class="col-sm-4 border-right"><b>Correo:</b></div>
                        <div class="col-sm-4 border-right corEdt"><b class="text-muted" id="txtEml"></b></div>
                        <div class="col-sm-4 border-right corEdt"><a href="#" class="pull-right" onclick="editCor()">Editar</a></div>
                      </div>
                    </li>

                    <?php  if ($_SESSION['Rol'] == 'Usuario') { ?>

                      <li class="list-group-item">
                        <div class="row rowdcc">
                          <div class="col-sm-4 border-right"><b>Dirección:</b></div>
                          <div class="col-sm-4 border-right dccEdt"><b class="text-muted" id="txtDcc"></b></div>
                          <div class="col-sm-4 border-right dccEdt"><a href="#" class="pull-right" onclick="editDcc()">Editar</a></div>
                        </div>
                      </li>

                    <?php } ?>

                    <li class="list-group-item">
                      <div class="row rowpas">
                        <div class="col-sm-4 border-right"><b>Contraseña:</b></div>
                        <div class="col-sm-4 border-right pasEdt"><b class="text-muted">***********</b></div>
                        <div class="col-sm-4 border-right pasEdt"><a href="#" class="pull-right" onclick="editPas()">Editar</a></div>
                        <div class="col-sm-8 frmEdtPas">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="edtPasf" class="col-sm-2 control-label">Nueva Contraseña</label>

                              <div class="col-sm-10 input-group">
                                <input type="password" class="form-control" name="edtPasf" maxlength="15" id="edtPasf" autocomplete="off">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-light btn-flat" id="ver-pass"><i class="fa fa-eye" id="icon"></i></button>
                                </span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label"></label>

                              <div class="col-sm-10">

                                <div class="bg-aqua disabled color-palette col-sm-10 alert alert-info alert-dismissible">
                                  La contraseña debe contener como mínimo de 8-15 caracteres
                                </div>

                              </div>
                            </div>

                        </div>
                        <button type="button" class="btn btn-default" onclick="cnlPas()">Cancelar</button>
                        <button type="button" class="btn btn-primary pull-right" id="btnNom" onclick="savePas()">Guardar Cambios</button>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Ventan modal para la actualización de la imagen de perfil-->

<div class="modal fade" id="myModalFile" role="dialog"> <!--Div que contiene la ventana modal-->
<div class="modal-dialog">

<section class="content modal-content">
<div class="box box-info">
            <div class="box-header modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="box-title">Actualizar Foto de perfil</h3>
            </div>
            <form autocomplete="off" enctype="multipart/form-data" id="actImgPerfilClient">
            <div class="box-body modal-body"> <!--Este Div es contenedor de los imputs-->

              <div class="form-group hidden" id="DivInputImg"> <!--Comienzo del div contenedor del input-->
                  <label for="usidimg" >Cédula</label>

                  <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control"
                          name="usidimg" id="usidimg">

                  </div><!--cierre div del inputt-->
              </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="imguser" >Seleccione imagen de perfil</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->

                        <input type="file" class="form-control"
                            name="imguser" id="imguser">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer modal-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="actuaImg()">Actualizar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
            </div>

          </section>

</div>
</div>


<script>
//funciones para cambiar el nombres
function editNom() {
  $('.nomEdt').hide();
  var txtNom = $('#txtNom').text();
  $('.rownom').append(
    `<div class="col-sm-8 frmEdtNom">
    <div class="box-body">
      <div class="form-group">
        <label for="edtNomf" class="col-sm-2 control-label">Nombre</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="edtNomf" maxlength="24" id="edtNomf" value="`+txtNom+`" autocomplete="off">
        </div>
      </div>

    </div>
    <button type="button" class="btn btn-default" onclick="cnlNom()">Cancelar</button>
    <button type="button" class="btn btn-primary pull-right" id="btnNom" onclick="saveNom()">Guardar Cambios</button>
    </div>`
  );
}

function saveNom() {

  var patronSoloLetr = /[^A-Za-záéíóúüñ ]/;
  var Max_LengthNomsDicc = 24;
  var length_nombreUser = $('#edtNomf').val().length;
  var nombreUser = $('#edtNomf').val();

  if ((nombreUser == "") ) { //Valida si los campos estan vacios
    swal("Upss", "No has ingresado un nombre!", "error");
  } else if (patronSoloLetr.test(nombreUser)){

      swal("Upss", "No se permite ingresar números y/o caracteres!", "error");

    } else if (length_nombreUser>Max_LengthNomsDicc) {
        swal("Upss", "Has ingresado una longitud no válida!", "error");
    } else {

      var serrl = '<?php echo $uerrl ?>';
      var serid = <?php echo $uerid ?>;

      $.ajax({
          url: Url+'/editPerfil/edtNom',
          type:'POST',
          data:{nomUser: nombreUser,
          serxid: serid,
          serxrl: serrl
          }
        }).done(function(data){
            if(data){
              swal("Bien Hecho!", "El cambio ha sido guardado!", "success");
              $('.frmEdtNom').remove();
              $('.nomEdt').show();
              setTimeout('location.reload()', 1500);
            }else{
                swal("Algo anda mal!", "No se pudo modificar el nombre!", "error");
              }
            })

    }
}

function cnlNom() {
  $('.frmEdtNom').remove();
  $('.nomEdt').show();
}

//funciones para cambiar el apellidos
function editApe() {
  $('.apeEdt').hide();
  var txtApe = $('#txtApe').text();
  $('.rowape').append(
    `<div class="col-sm-8 frmEdtApe">
    <div class="box-body">
      <div class="form-group">
        <label for="edtApef" class="col-sm-2 control-label">Apellido</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="edtApef" maxlength="24" id="edtApef" value="`+txtApe+`" autocomplete="off">
        </div>
      </div>

    </div>
    <button type="button" class="btn btn-default" onclick="cnlApe()">Cancelar</button>
    <button type="button" class="btn btn-primary pull-right" id="btnNom" onclick="saveApe()">Guardar Cambios</button>
    </div>`
  );
}

function saveApe() {

  var patronSoloLetr = /[^A-Za-záéíóúüñ ]/;
  var Max_LengthNomsDicc = 24;
  var length_apelliUser = $('#edtApef').val().length;
  var apelliUser = $('#edtApef').val();

  if ((apelliUser == "") ) { //Valida si los campos estan vacios
    swal("Upss", "No has ingresado un apellido!", "error");
  } else if (patronSoloLetr.test(apelliUser)){

      swal("Upss", "No se permite ingresar números y/o caracteres!", "error");

    } else if (length_apelliUser>Max_LengthNomsDicc) {
        swal("Upss", "Has ingresado una longitud no válida!", "error");
    } else {

      var serrl = '<?php echo $uerrl ?>';
      var serid = <?php echo $uerid ?>;

      $.ajax({
          url: Url+'/editPerfil/edtApe',
          type:'POST',
          data:{apeUser: apelliUser,
          serxid: serid,
          serxrl: serrl
          }
        }).done(function(data){
            if(data){
              swal("Bien Hecho!", "El cambio ha sido guardado!", "success");
              $('.frmEdtNom').remove();
              $('.nomEdt').show();
              setTimeout('location.reload()', 1500);
            }else{
                swal("Algo anda mal!", "No se pudo modificar el apellido!", "error");
              }
            })

    }
}

function cnlApe() {
  $('.frmEdtApe').remove();
  $('.apeEdt').show();
}

//funciones para cambiar el Telefono
function editTel() {
  $('.telEdt').hide();
  var txtTel = $('#txtTel').text();
  $('.rowtel').append(
    `<div class="col-sm-8 frmEdtTel">
    <div class="box-body">
      <div class="form-group">
        <label for="edtTelf" class="col-sm-2 control-label">Teléfono</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="edtTelf" maxlength="14" id="edtTelf" value="`+txtTel+`" autocomplete="off">
        </div>
      </div>

    </div>
    <button type="button" class="btn btn-default" onclick="cnlTel()">Cancelar</button>
    <button type="button" class="btn btn-primary pull-right" id="btnNom" onclick="saveTel()">Guardar Cambios</button>
    </div>`
  );
}

function saveTel() {

  var patronLetrEspecial = /\D/;
  var Max_LengthNomsDicc = 14;
  var length_telefoUser = $('#edtTelf').val().length;
  var telefoUser = $('#edtTelf').val();

  if ((telefoUser == "") ) { //Valida si los campos estan vacios
    swal("Upss", "No has ingresado un número telefónico!", "error");
  } else if (patronLetrEspecial.test(telefoUser)){

      swal("Upss", "El teléfono ingresado no es válido!", "error");

    } else if (length_telefoUser>Max_LengthNomsDicc) {
        swal("Upss", "Has ingresado una longitud no válida!", "error");
    } else {

      var serrl = '<?php echo $uerrl ?>';
      var serid = <?php echo $uerid ?>;

      $.ajax({
          url: Url+'/editPerfil/edtTel',
          type:'POST',
          data:{telUser: telefoUser,
          serxid: serid,
          serxrl: serrl
          }
        }).done(function(data){
            if(data){
              swal("Bien Hecho!", "El cambio ha sido guardado!", "success");
              srchd();
              cnlTel();
            }else{
                swal("Algo anda mal!", "No se pudo modificar el apellido!", "error");
              }
            })

    }
}

function cnlTel() {
  $('.frmEdtTel').remove();
  $('.telEdt').show();
}

//funciones para cambiar el correo
function editCor() {
  $('.corEdt').hide();
  var txtCor = $('#txtEml').text();
  $('.rowcor').append(
    `<div class="col-sm-8 frmEdtCor">
    <div class="box-body">
      <div class="form-group">
        <label for="edtCorf" class="col-sm-2 control-label">Correo</label>

        <div class="col-sm-10 input-group">
          <input type="text" class="form-control" name="edtCorf" maxlength="29" id="edtCorf" value="`+txtCor+`" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
      <label class="col-sm-2 control-label"></label>

      <div class="col-sm-10">

      <div class="bg-yellow disabled color-palette col-sm-10 alert alert-warning alert-dismissible">
          <h4><i class="icon fa fa-warning"></i> Advertencia!</h4>
          Si piensas en modificar su correo electrónico, asegurece en diligenciarlo correctamente,
          ya que por este medio se ussará para la recuperación de su contraseña y/o medio de contacto.
        </div>

      </div>
      </div>

    </div>
    <button type="button" class="btn btn-default" onclick="cnlCor()">Cancelar</button>
    <button type="button" class="btn btn-primary pull-right" id="btnNom" onclick="saveCor()">Guardar Cambios</button>
    </div>`
  );
}

function saveCor() {

  var patronCorreo = /\w+@\w+\.+[a-z]/;
  var Max_LengthNomsDicc = 29;
  var length_correoUser = $('#edtCorf').val().length;
  var correoUser = $('#edtCorf').val();

  if ((correoUser == "") ) { //Valida si los campos estan vacios
    swal("Upss", "No has ingresado un correo!", "error");
  } else if (!patronCorreo.test(correoUser)){

      swal("Upss", "El Correo ingresado no es válido!", "error");

    } else if (length_correoUser>Max_LengthNomsDicc) {
        swal("Upss", "Has ingresado una longitud no válida!", "error");
    } else {

      var serrl = '<?php echo $uerrl ?>';
      var serid = <?php echo $uerid ?>;

      $.ajax({
          url: Url+'/editPerfil/edtCor',
          type:'POST',
          data:{corUser: correoUser,
          serxid: serid,
          serxrl: serrl
          }
        }).done(function(data){
            if(data){
              swal("Cambio exitoso!", "El cambio ha sido guardado!", "success");
              srchd();
              cnlCor();
            }else{
                swal("Algo anda mal!", "No se pudo modificar el apellido!", "error");
              }
            })

    }
}

function cnlCor() {
  $('.frmEdtCor').remove();
  $('.corEdt').show();
}

//funciones para cambiar la contraseña
function editPas() {
  $('.pasEdt').hide();
  $('.frmEdtPas').show();
}

function savePas() {

  var Max_Lengthpass = 15;
  var Min_Lengthpass = 8;
  var length_passUser = $('#edtPasf').val().length;
  var passUser = $('#edtPasf').val();

  if ((passUser == "") ) { //Valida si los campos estan vacios
    swal("Upss", "No has ingresado una contraseña!", "error");
  } else if ((length_passUser>Max_Lengthpass) || (length_passUser<Min_Lengthpass)){
      swal("Upss", "La contraseña debe tener como mínimo 8-15 caracteres!", "error");
    } else {

      var serrl = '<?php echo $uerrl ?>';
      var serid = <?php echo $uerid ?>;

      $.ajax({
          url: Url+'/editPerfil/edtPas',
          type:'POST',
          data:{pasUser: passUser,
          serxid: serid,
          serxrl: serrl
          }
        }).done(function(data){
            if(data){
              swal("Cambio exitoso!", "Su contraseña ha sido guardada!", "success");
              srchd();
              cnlPas();
            }else{
                swal("Algo anda mal!", "No se pudo modificar su contraseña!", "error");
              }
            })

    }
}
//mostrar ocultar contraseña
$(function(){
  $("#ver-pass").mouseup(function(){//#ver-pass es el id del boton, al soltarlo el hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye');//cambiará la clase del icono
        $("#edtPasf").prop('type', 'password');//cambiará el type al input
    });
    $("#ver-pass").mousedown(function(){ //#ver-pass es el id del boton al dejar presionado hará las siguientes instrucciones
        $("#icon").prop('class', 'fa fa-eye-slash');//cambiará la clase del icono
        $("#edtPasf").prop('type', 'text');//cambiará el type al input

    });
})

function cnlPas() {
  $('.frmEdtPas').hide();
  $('.pasEdt').show();
}

//funciones para la imagen
function actuaImg() //funcion para enviar los cambios al controlador
{
  var datosimg = new FormData($('#actImgPerfilClient')[0]);
  console.log(datosimg)

      $.ajax({
          url: Url+'/editPerfil/actImg',
          type:'POST',
          data: datosimg,
          contentType: false,
          processData: false,
        }).done(function(data){
          if (data=='Error Archivo') {
            swal("Algo anda mal!", "Es posible que la imagen este dañada!", "error");
          }
          if (data=='img no permitida') {
            swal("¿Que haces?", "Este formato no esta permitido!", "error");
          }
          if (data=='La imagen ya existe') {
            swal("Wow", "Esta imagen ya existe! Intenta cambiarle el nombre a tu archivo.", "error");
          }
          if (data=='Error al guardar imagen') {
            swal("Lo sentimos :(", "Hubo un error al guardar la imagen", "error");
          }
          if (data==1) {
            swal("Bien Hecho!", "Su imagen  ha sido actualizada!", "success");
            $('#usidimg').val('');
            $('#imguser').fileinput('clear');
            $("#myModalFile").modal("hide");
            setTimeout('location.reload()', 1500);
          }

          })
}

function showModalImg() //funcion plasmar los datos del usuario en los inputs
{
  var usid = <?php echo $_SESSION['usid']; ?>;
  $('#usidimg').val(usid);
  $('#DivInputImg').hide();
  $("#myModalFile").modal("show");
}

$('#imguser').fileinput({
  theme: 'fa',
  language: 'es',
  showUpload : false,
  allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});

//funciones para cambiar la dirección de clientes
function editDcc() {
  $('.dccEdt').hide();
  var txtDcc = $('#txtDcc').text();
  $('.rowdcc').append(
    `<div class="col-sm-8 frmEdtDcc">
    <div class="box-body">
      <div class="form-group">
        <label for="edtDccf" class="col-sm-2 control-label">Dirección</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="edtDccf" maxlength="24" id="edtDccf" value="`+txtDcc+`" autocomplete="off">
        </div>
      </div>

    </div>
    <button type="button" class="btn btn-default" onclick="cnlDcc()">Cancelar</button>
    <button type="button" class="btn btn-primary pull-right" id="btnNom" onclick="saveDcc()">Guardar Cambios</button>
    </div>`
  );
}

function saveDcc() {

  var Max_LengthNomsDicc = 24;
  var length_direccUser = $('#edtDccf').val().length;
  var direccionUser = $('#edtDccf').val();

  if ((direccionUser == "") ) { //Valida si los campos estan vacios
    swal("Upss", "No has ingresado una dirección!", "error");
  } else if (length_direccUser>Max_LengthNomsDicc) {
        swal("Upss", "Has ingresado una longitud no válida!", "error");
    } else {

      var serid = <?php echo $uerid ?>;

      $.ajax({
          url: Url+'/editPerfil/edtDcc',
          type:'POST',
          data:{dccUser: direccionUser,
          serxid: serid
          }
        }).done(function(data){
            if(data){
              swal("Bien Hecho!", "El cambio ha sido guardado!", "success");
              srchd();
              cnlDcc();
            }else{
                swal("Algo anda mal!", "No se pudo modificar el nombre!", "error");
              }
            })

    }
}

function cnlDcc() {
  $('.frmEdtDcc').remove();
  $('.dccEdt').show();
}

function ShowIMgOpctyEdt() {
  $('#imgOpctyEdt').show();
}
function normalImg() {
  $('#imgOpctyEdt').hide();
}

$(function () {
  $('#imgOpctyEdt').hide();
  $('.frmEdtPas').hide();
});

</script>
