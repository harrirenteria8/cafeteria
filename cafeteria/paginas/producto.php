<div class="container">
   <div class="row" style="margin-top: 25px;">
      <h3>Lista de Productos</h3>
   </div>
   <div class="row">
      <table class="table table-hover">
         <thead>
            <!-- cabecera de la tabla-->
            <tr>
               <th></th>
               <th>nombre de producto</th>
               <th>referencia</th>
               <th>precio</th>
               <th>peso</th>
               <th>categoria</th>
               <th>stock</th>
               <th>fecha creación</th>
            </tr>
         </thead>
         <!-- fin cabecera de la tabla-->
         <tbody>
            <?php 
               $result = $db->getRegistros("producto");
               
               if($result){
                   foreach($result as $r){
               ?>
            <tr>
               <td><input type="radio" name="idproducto" id="" value="<?php echo $r['id']; ?>" onCLick="selectregistro(<?php echo $r['id']; ?>);"></td>
               <td><?php echo $r['nombre_producto']; ?></td>
               <td><?php echo $r['referencia']; ?></td>
               <td><?php echo $r['precio']; ?></td>
               <td><?php echo $r['peso']; ?></td>
               <td><?php echo $r['categoria']; ?></td>
               <td><?php echo $r['strock']; ?></td>
               <td><?php echo $r['fecha']; ?></tb>
            </tr>
            <?php
               }
               }
               
               ?>
         </tbody>
      </table>
      <div class="row" style="text-align: right ;">
         <a href="javascript:;" class="btn btn-primary col-2" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >Agredar Producto</a>
         <a href="javascript:;" onclick="eliminar();" class="btn btn-danger col-2" role="button" >Eliminar Producto</a>
         <a href="javascript:;" onclick="editbtn()" class="btn btn-info col-2" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >Editar Producto</a>
      </div>
   </div>
   <hr>
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="">
                  <input type="hidden" name="id" value="id">
                  <div class="row">
                     <div class="input-group mb-3 ">
                        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Nombre del Producto">
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-group mb-3 ">
                        <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Referencia">
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-group mb-3 ">
                        <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio">
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-group mb-3 ">
                        <input type="number" name="peso" id="peso" class="form-control" placeholder="Peso">
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-group mb-3 ">
                        <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Categoria">
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-group mb-3 ">
                        <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
                     </div>
                  </div>
                  <div class="row">
                     <span>Fecha de Creación</span>
                     <div class="input-group mb-3 ">
                        <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha de Creaciion" >
                     </div>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
               <button type="button" class="btn btn-primary" onclick="crearProducto();" id="btn_guardar">Guardar</button>
               <button type="button" class="btn btn-primary" onclick="editarRegistro();" id="btn_modificar">Guardar Cambios</button>
            </div>
         </div>
      </div>
   </div>
</div>