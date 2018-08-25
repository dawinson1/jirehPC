<script>
        function modiCliente(){
        var id_cliente = $('#identificador').val();
        var nombreCliente = $('#nomCliente').val();
        var apellidoCliente = $('#apeCliente').val();
        var correoCliente = $('#correoCliente').val();
        var direccionCliente = $('#direcCliente').val();
        var telefono = $('#telCliente').val();
        var contrasena = $('#passCliente').val();
    
        if ((id_cliente == "") || (nombreCliente == "") || (apellidoCliente == "") || (correoCliente == "") || (direccionCliente == "") || (telefono == "") || (contrasena == "")) { //Valida si los campos estan vacios
            swal("Upss", "Los campos no pueden ir vacios!", "error");
        } else {
            $.ajax({
                url: Url+'/cliente/editarCliente',
                type:'POST',
                data:{identificador: id_cliente,
                nomCliente: nombreCliente,
                apeCliente: apellidoCliente,
                correoCliente: correoCliente,
                direcCliente: direccionCliente,
                telCliente: telefono,
                passCliente: contrasena
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
/*$(function(){
    $.ajax({
     url: Url+'cliente/buscandoCliente',
     type:'POST',
     dataType:'json'
 }).done(function(data){
     //console.log(data);
        document.getElementById("identificador").disabled = true;
        document.getElementById("lup_identificador").disabled = true;
     })

 })


function mostrarCliente(){

}*/

</script>