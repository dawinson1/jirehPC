<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <b class="box-title">Empleado</b>

            </div>
            <form>
            <div class="box-body"> <!--Este Div es es contenedor de los imputs-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="idEmpleado" >Documento de Identidad:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese documento del empleado"
                            name="idEmpleado" id="idEmpleado"  autocomplete="off" maxlength="10">

                        <div class="input-group-addon"> <!--Este div es opcional, servirá cuando queramos que en frente del input este otro icono-->
                        <i class="glyphicon glyphicon-search"></i>
                        </div> <!--Cierre del div opcional-->

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6 "> <!--Comienzo del div contenedor del input-->
                    <label for="nombre">Nombres:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese nombre del empleado"
                        name="nombre" id="nombre"  autocomplete="off" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6 "> <!--Comienzo del div contenedor del input-->
                    <label for="apellido">Apellidos:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese apellidos del empleado"
                        name="apellido" id="apellido"  autocomplete="off" maxlength="24">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="telefono">Teléfono:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                        <input type="email" class="form-control" placeholder="Teléfono"
                         name="telefono" id="telefono" autocomplete="off" maxlength="19">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="correo">Correo:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Ingrese correo electrónico"
                        name="correo" id="correo"  autocomplete="off" maxlength="29">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="passEmpl">Contraseña:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Ingrese su Contraseña"
                        name="passEmpl" id="passEmpl"  autocomplete="off" maxlength="15">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="id_rol">Rol:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                        <select id="id_rol" class="form-control" name="id_rol">

                        </select>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <!--INPUT DE ESTADO-->
                <div class="form-group col-xs-6"> <!--Comienzo del div contenedor del input-->
                    <label for="id_estado">Estado:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                        <select id="id_estado" class="form-control" name="id_estado">

                        </select>

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->
                 <!--INPUT DE ESTADO-->


            </div> <!--Cierre del Div contenedor-->
            </form>

            <div class="box-footer"> <!--Div que separa el formulario y contendrá los botones-->
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="button" class="btn btn-info pull-right" onclick="crearEmpleado()">Registrar</button>
              </div> <!--Cierra Div que separa el formulario y contendrá los botones-->
          </div>

          </section>
          </div>

          <script>

        function crearEmpleado(){
        var patronNum = /[0-9]/;
        var patronLetrEspecial = /\D/;
        var patronSoloLetr = /[^A-Za-záéíóúüñ ]/;
        var patronCorreo = /\w+@\w+\.+[a-z]/

        var Max_LengthTel = 19;
        var Max_LengthID = 10;
        var Max_LengthNomsDicc = 24;
        var Max_LengthEmail = 29;
        var Max_Lengthpass = 15;
        var Min_Lengthpass = 8;

        var length_idEmpleado = $('#idEmpleado').val().length;
        var length_nombreEmpleado = $('#nombre').val().length;
        var length_apellido = $('#apellido').val().length;
        var length_telefono = $('#telefono').val().length;
        var length_correo = $('#correo').val().length;
        var length_pass = $('#passEmpl').val().length;

        var idEmpleado = $('#idEmpleado').val();
        var nombreEmpleado = $('#nombre').val();
        var apellido = $('#apellido').val();
        var telefono = $('#telefono').val();
        var correo = $('#correo').val();
        var pass = $('#passEmpl').val();
        var id_rol = $('#id_rol').val();
        var id_estado = $('#id_estado').val();
        var imgEmpleado = 'img/TedDefault.jpg';

        if ((idEmpleado == "") || (nombre == "") || (apellido == "") || (telefono == "") || ( correo == "") || ( pass == "") ||  (id_rol == "Seleccionar") || (id_estado == "Seleccionar")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        } else if (patronLetrEspecial.test(idEmpleado)){
      //sintaxis para validar que el campo no contenga números. patron es la experesion regular, dentro del .test() se pone la variable a comparar
          //$( "#alertID" ).addClass( "has-error" );
          swal("Upss", "No se permite ingresar letras y/o caracteres especiales!", "error");

        }else if (patronSoloLetr.test(nombreEmpleado)){

            swal("Upss", "No se permite ingresar números y/o caracteres en el campo Nombre!", "error");

          } else if (patronSoloLetr.test(apellido)){

            swal("Upss", "No se permite ingresar números y/o caracteres en el campo Apellido!", "error");

          } else if (!patronCorreo.test(correo)){

            swal("Upss", "El correo ingresado no es válido!", "error");

          } else if (patronLetrEspecial.test(telefono)){

            swal("Upss", "El teléfono ingresado no es válido!", "error");

          } else if ((length_idEmpleado>Max_LengthID) || (length_nombreEmpleado>Max_LengthNomsDicc) ||
            (length_apellido>Max_LengthNomsDicc) || (length_correo>Max_LengthEmail) ||
            (length_telefono>Max_LengthTel)) {
              swal("Upss", "Has ingresado una longitud no válida!", "error");
          }else if ((length_pass>Max_Lengthpass) || (length_pass<Min_Lengthpass)) {
            swal("Upss", "La contraseña debe tener como mínimo 8-15 caracteres!", "error");
          }else {
            $.ajax({
                url: Url+'empleado/crearEmpleado',
                type:'POST',
                data:{ nombre: nombreEmpleado, /* nombre será enviada al controller, nombreEmpleado viene ->formulario.*/
                apellido: apellido,
                telefono: telefono,
                idEmpleado: idEmpleado,
                correo: correo,
                passEmpl: pass,
                id_rol: id_rol,
                id_estado: id_estado
               }
            }).done(function(data){
                if(data){
                    swal("Bien Hecho!", "El Registro ha sido completado!", "success");
                    $('#idEmpleado').val('');
                    $('#nombre').val('');
                    $('#apellido').val('');
                    $('#telefono').val('');
                    $('#correo').val('');
                    $('#passEmpl').val('');
                    $('#id_rol').val('');
                    $('#id_estado').val('');
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }
    }

$(function(){
  listarSelectRol();
  listarSelectEstado();
})

function listarSelectRol() {
  $.ajax({
     url:Url+'/empleado/listarRoles',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelectRol = '';
     data.forEach(function(p){
      valueSelectRol+='<option value='+p.idRol+'>'+p.Nombre+'</option>';
     })
     $('#id_rol').empty();
     $('#id_rol').html('<option value="" selected="selected">Seleccionar</option>');
     $('#id_rol').append(valueSelectRol);
 })
}

function listarSelectEstado() {
  $.ajax({
     url:Url+'/empleado/listarEstados',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
     var valueSelectEstado = '';
     data.forEach(function(p){
      valueSelectEstado+='<option value='+p.id_estado+'>'+p.nombre+'</option>';
     })
     $('#id_estado').empty();
     $('#id_estado').html('<option value="" selected="selected">Seleccionar</option>');
     $('#id_estado').append(valueSelectEstado);
 })
}
</script>
