<div class="content-wrapper">
<section class="content">
<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Empleado</h3>
            </div>
            <form>
            <div class="box-body"> <!--Este Div es es contenedor de los imputs-->
              
                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="idEmpleado" >Documento de Identidad:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese documento del empleado"
                            name="idEmpleado" id="idEmpleado">

                        <div class="input-group-addon"> <!--Este div es opcional, servirá cuando queramos que en frente del input este otro icono-->
                        <i class="glyphicon glyphicon-search"></i>
                        </div> <!--Cierre del div opcional-->

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="nombre">Nombres:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese nombre del empleado"
                        name="nombre" id="nombre">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="apellido">Apellidos:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese apellidos del empleado"
                        name="apellido" id="apellido">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="telefono">Teléfono:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                        <input type="email" class="form-control" placeholder="Teléfono"
                         name="telefono" id="telefono">


                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="correo">Correo:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Ingrese correo electrónico"
                        name="correo" id="correo">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="id_rol">Rol:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese rol"
                        name="id_rol" id="id_rol">

                    </div><!--cierre div del inputt-->
                </div> <!--cierre del div contenedor del input-->

                <div class="form-group"> <!--Comienzo del div contenedor del input-->
                    <label for="id_estado">Estado 12 Activo/13 Inactivo </label>
            
                    <div class="input-group my-colorpicker2 colorpicker-element"> <!--comienzo div del inputt-->
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="number" name="id_estado" min="12" max="13" >
                       <!-- <select name="" class="form-control form-control-sm">
                         <option>12</option>
                         <option>13</option>
                               </select>-->

                    </div><!--cierre div del input-->
                </div> <!--cierre del div contenedor del input-->

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
        var idEmpleado = $('#idEmpleado').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var telefono = $('#telefono').val();
        var correo = $('#correo').val();
        var id_rol = $('#id_rol').val();
        var id_estado = $('#id_estado').val();
    
        if ((idEmpleado == "") || (nombre == "") || (apellido == "") || (telefono == "") || ( correo == "") || (id_rol == "") || (id_estado == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        } else {
            $.ajax({
                url: Url+'/empleado/crearEmpleado',
                type:'POST',
                data:{ nombre: nombre,
                apellido: apellido,
                telefono: telefono,
                idEmpleado: idEmpleado,
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
                    $('#id_rol').val('');
                    $('#id_estado').val('');
                }else{
                    swal("Algo anda mal!", "El Registro no ha sido completado!", "error");
                }
            })
        }
    }

</script>