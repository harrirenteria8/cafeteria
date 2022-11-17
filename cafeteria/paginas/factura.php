<?php $f = "00".rand(1,100); ?>

<div class="container">
        <div class="card">
          <div class="card-header">
            
          </div>
          <div class="card-body">
               <div class="row">
                    <div class="row col-md-3">
                        <input type="hidden" name="_id_producto" id="_id_producto" value="">
                        <input type="hidden" name="_factura" id="_factura" value="<?php echo $f; ?>">
                        <input type="text" class="form-control" name="reference" id="reference" onblur="buscarProducto();">
                    </div>
                    <div class="row col-md-3">
                        <input type="text" class="form-control" disabled="disabled" id="nombre_pro" name="nombre_pro">
                    </div>
                    <div class="row col-md-2">
                        <input type="text" class="form-control" disabled="disabled" id="precio_pro" name="precio_pro">
                    </div>
                    <div class="row col-md-2">
                        <input type="text" class="form-control" disabled="disabled" id="stock_pro" name="stock_pro">
                    </div>
                    <div class="row col-md-2">
                        <input type="number" class="form-control" id="cantidad_compra" id="cantidad_compra">
                    </div>
                    <div class="row col-md-1">
                        <button class="btn btn-warning" onclick="agregarProductos();">+</button>
                    </div>
               </div>
          </div>
        </div>

        <hr>

        <div class="row" style="text-align: right;">
            <h3>Factura : <?php echo $f;?></h3>
        </div>

        <table class="table" id="grilla">
          <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
          
        </table>

        <div class="row" style="text-align: right;">
            <h3 id="totalventa"></h3>
        </div>

        <div class="row justify-content-md-end">
            <a href="javascript:;" class="btn btn-success btn-lg col-md-3" onclick="guardarFactura(<?php echo $f;?>);">Registrar venta</a>
        </div>
    </div>
