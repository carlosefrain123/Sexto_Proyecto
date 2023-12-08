<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="producto_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_producto" name="id_producto">

                    <div class="form-group">
                        <label class="form-label" for="Nombre_producto">Nombre del Producto</label>
                        <input type="text" class="form-control" id="Nombre_producto" name="Nombre_producto" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Descripcion_producto">Descripción</label>
                        <input type="text" class="form-control" id="Descripcion_producto" name="Descripcion_producto" placeholder="Ingrese Descripción" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Precio_producto">Precio</label>
                        <input type="text" class="form-control" id="Precio_producto" name="Precio_producto" placeholder="Ingrese Precio" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Stock_producto">Stock</label>
                        <input type="text" class="form-control" id="Stock_producto" name="Stock_producto" placeholder="Ingrese Stock" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" id="#" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>