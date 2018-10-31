<div class="content-wrapper">
  <center><h3 class="box-title">Catálogo</h3></center>
<section class="content">
<div class="row" id="listCatalogo">

</div>
</section>
</div>

<!--AJAX-->
<script>

$(function(){
listarCatalogo();
})

function listarCatalogo(){
$.ajax({
    url:Url+'/producto/listarCatalogo',
    type: 'POST',
    dataType:'json'
}).done(function(data){

    var listCatalogo = '';
    data.forEach(function(c){

    listCatalogo+='<div class="col-md-3">'+
      '<div class="box box-primary">'+
        '<div class="box-body">'+
        '<div class="list-group" style="height: 10em;width: 15em;" >'+
          '<img src="<?php echo URL ?>'+c.Url_imgProduct+'" style="height: 100%;width: 100%;">'+
        '</div>'+
          '<ul class="list-group list-group-unbordered">'+
            '<li class="list-group-item">'+
              '<b>Nombre:</b> <p class="pull-right">'+c.nombreProducto+'</p>'+
            '</li>'+
            '<li class="list-group-item">'+
              '<b>Referencia:</b> <p class="pull-right">'+c.referencia+'</p>'+
            '</li>'+
            '<li class="list-group-item">'+
              '<b>Marca:</b> <p class="pull-right">'+c.marca+'</p>'+
            '</li>'+
            '<li class="list-group-item">'+
              '<b>Cantidad disponible:</b> <p class="pull-right">'+c.cantidad+'</p>'+
            '</li>'+
            '<li class="list-group-item">'+
              '<b>Precio:</b> <p class="pull-right">$'+c.precioUnit+'</p>'+
            '</li>'+
          '</ul>'+
        '</div>'+
      '</div>'+
    '</div>';
    })
    $('#listCatalogo').empty();
    $('#listCatalogo').append(listCatalogo);
})
}

</script>
