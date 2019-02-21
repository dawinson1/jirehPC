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
              <img class="img-circle" id="imgusuario" src="" alt="User Avatar">
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
                      <div class="row">
                        <div class="col-sm-4 border-right"><b>Apellido:</b></div>
                        <div class="col-sm-4 border-right"><b class="text-muted" id="txtApe"></b></div>
                        <div class="col-sm-4 border-right"><a href="#" class="pull-right">Editar</a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-sm-4 border-right"><b>Telefono:</b></div>
                        <div class="col-sm-4 border-right"><b class="text-muted" id="txtTel"></b></div>
                        <div class="col-sm-4 border-right"><a href="#" class="pull-right">Editar</a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-sm-4 border-right"><b>Correo:</b></div>
                        <div class="col-sm-4 border-right"><b class="text-muted" id="txtEml"></b></div>
                        <div class="col-sm-4 border-right"><a href="#" class="pull-right">Editar</a></div>
                      </div>
                    </li>

                    <?php  if ($_SESSION['Rol'] == 'Usuario') { ?>

                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-sm-4 border-right"><b>Dirección:</b></div>
                          <div class="col-sm-4 border-right"><b class="text-muted" id="txtDcc"></b></div>
                          <div class="col-sm-4 border-right"><a href="#" class="pull-right">Editar</a></div>
                        </div>
                      </li>

                    <?php } ?>

                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-sm-4 border-right"><b>Contraseña:</b></div>
                        <div class="col-sm-4 border-right"><b class="text-muted">***********</b></div>
                        <div class="col-sm-4 border-right"><a href="#" class="pull-right">Editar</a></div>
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


<script>

function editNom() {
  $('.nomEdt').hide();
  var txtNom = $('#txtNom').text();
  $('.rownom').append(
    `<div class="col-sm-8 frmEdtNom">
    <div class="box-body">
      <div class="form-group">
        <label for="edtNomf" class="col-sm-2 control-label">Nombre</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="edtNomf" id="edtNomf" value="`+txtNom+`">
        </div>
      </div>

    </div>
    <button type="button" class="btn btn-default" onclick="cnlNom()">Cancelar</button>
    <button type="button" class="btn btn-primary pull-right" id="btnNom" onclick="saveNom()">Guardar Cambios</button>
    </div>`
  );
}
function cnlNom() {
  $('.frmEdtNom').remove();
  $('.nomEdt').show();
}

function saveNom() {

}

</script>
