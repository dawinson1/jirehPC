<div class="content-wrapper" id="carga">

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12">


<div class="box">
<div class="text-center">
  <div class="box-header">
    <b class="box-title">Mapa de Navegación</b>
  </div>
</div>
<br>
  <!-- /.box-header -->
  <div class="box-body">
  


            <!-- Empleado -->
            <div class="col-md-3"> 
                           
                           <div class="list-group">
         <li type="button" class="list-group-item disabled"><b>Empleado</b></li>
         <button   onclick="registrarEmpleado()" type="button" class="list-group-item"><a href="<?php echo URL; ?>empleado/formEmpleado" >Registrar Empleado</a></button>
        <button   onclick="consultarEmpleado()" type="button" class="list-group-item"> <a href="<?php echo URL; ?>empleado" >Consultar Empleado</a></button>
                       </div>
                </div>
       
        <!-- Pedidos -->
       <div class="col-md-3">              
                           <div class="list-group">
         <li type="button" class="list-group-item disabled"><b>Pedidos</b></li>
         <button onclick="registrarPedido()" type="button" class="list-group-item"><a href="<?php echo URL; ?>pedido/formPedidos" >Registrar Pedido</a></button>
         <button onclick="consultarPedido()" type="button" class="list-group-item"><a href="<?php echo URL; ?>pedido" >Consultar Cliente</a></button>
                       </div>
                </div>
       
        <!-- Cliente -->
       <div class="col-md-3">              
                           <div class="list-group">
         <li type="button" class="list-group-item disabled"><b>Cliente</b></li>
         <button onclick="registrarCliente()" type="button" class="list-group-item"><a href="<?php echo URL; ?>cliente/formCliente" >Registrar Cliente</a></button>
         <button onclick="consultarCliente()" type="button" class="list-group-item"><a href="<?php echo URL; ?>cliente" >Consultar Cliente</a> </button>
                       </div>
                </div>
       
        <!-- Existencias -->
       
       
        <div class="col-md-3">              
                           <div class="list-group">
         <li type="button" class="list-group-item disabled"><b>Control de Existencias</b></li>
         <button onclick="listarEntrada()" type="button" class="list-group-item"><a href="<?php echo URL; ?>entrada">Consultar Entrada</a></button>
         <button onclick="listarSalida()" type="button" class="list-group-item"><a href="<?php echo URL; ?>salida">Consultar Salida</a></button>
                       </div>
                </div>
       
       <!-- Categoria -->
       
       
       <div class="col-md-3">              
                           <div class="list-group ">
         <li type="button" class="list-group-item disabled"><b>Categoría</b></li>
         <button onclick="registrarCategoria()" type="button" class="list-group-item"><a href="<?php echo URL; ?>categoria/formCategoria" >Registrar Categoría</a></button>
         <button onclick="consultarCategoria()" type="button" class="list-group-item"><a href="<?php echo URL; ?>categoria" >Consultar Categoría</a></button>
                       </div>
                </div>
       
        <!-- Marca -->
       
       
        <div class="col-md-3">              
                           <div class="list-group ">
         <li type="button" class="list-group-item disabled"><b>Marca</b></li>
         <button onclick="registrarMarca()" type="button" class="list-group-item"><a href="<?php echo URL; ?>marca/formMarca" >Registrar Marca</a></button>
         <button onclick="consultarMarca()" type="button" class="list-group-item"><a href="<?php echo URL; ?>marca" >Consultar Marca</a></button>
                       </div>
                </div>

               <!-- Productos -->
       
       
       <div class="col-md-3">              
                           <div class="list-group">
         <li type="button" class="list-group-item disabled"><b>Productos</b></li>
         <button onclick="registrarProducto()" type="button" class="list-group-item"><a href="<?php echo URL; ?>producto/formProducto" >Registrar Producto</a></button>
         <button onclick="consultarProducto()" type="button" class="list-group-item"><a href="<?php echo URL; ?>producto" >Consultar Producto</a></button>
         <button onclick="catalogo()" type="button" class="list-group-item"><a href="<?php echo URL; ?>producto/catalogo">Catálogo</a></button>
                          </div>
                </div>
       
   

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

      </div>

       </div>

    </section>
  
</div>

<script>

 function registrarEmpleado(){
  location.href = Url+'empleado/formEmpleado'

}

function consultarEmpleado(){
  location.href = Url+'empleado'

}

function consultarCliente(){
  location.href = Url+'cliente'

}

function registrarCliente(){
  location.href = Url+'cliente/formCliente'

}

function consultarPedido(){
  location.href = Url+'pedido'

}

function registrarPedido(){
  location.href = Url+'pedido/formPedidos'

}

function listarEntrada(){
  location.href = Url+'entrada'

}

function listarSalida(){
  location.href = Url+'salida'

}

function consultarCategoria(){
  location.href = Url+'categoria'

}

function registrarCategoria(){
  location.href = Url+'categoria/formCategoria'

}

function consultarMarca(){
  location.href = Url+'marca'

}

function registrarMarca(){
  location.href = Url+'marca/formMarca'

}

function consultarProducto(){
  location.href = Url+'producto'

}

function registrarProducto(){
  location.href = Url+'producto/formProducto'

}

function catalogo(){
  location.href = Url+'producto/catalogo'

}

</script>


