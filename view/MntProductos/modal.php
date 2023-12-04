<div class="modal fade" id="modalmantenimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><!--modalmantenimiento-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center text-primary" id="mdltitulo"></h5>
            </div>
            <div class="modal-body">
                <form id="producto_form" method="post">
                    <input type="hidden" id="id_producto" name="id_producto">

                    <div class="mb-3">
                        <label for="Nombre_producto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="Nombre_producto" name="Nombre_producto">
                    </div>

                    <div class="mb-3">
                        <label for="Descripcion_producto" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="Descripcion_producto" name="Descripcion_producto">
                    </div>

                    <div class="mb-3">
                        <label for="Precio_producto" class="form-label">Precio</label>
                        <input type="text" class="form-control" id="Precio_producto" name="Precio_producto">
                    </div>

                    <div class="mb-3">
                        <label for="Stock_producto" class="form-label">Stock</label>
                        <input type="text" class="form-control" id="Stock_producto" name="Stock_producto">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarCambiosBtn">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>