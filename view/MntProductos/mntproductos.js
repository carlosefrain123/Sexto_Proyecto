var tabla;
function init() {
  $("#producto_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}
$(document).ready(function () {
  //TODO: Se agrega el Combo
  $.post("../../controller/categoria.php?op=combo",function (data) {
    //console.log(data);
    $('#id_categoria').html(data);
  });
  tabla = $("#productos_data")
    .dataTable({
      aProcessing: true, //Activamos el procesamiento del datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../../controller/controller.php?op=listar",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 10, //Por cada 10 registros hace una paginación
      order: [[0, "asc"]], //Ordenar (columna,orden)
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable();
});
function editar(id_producto){
  $.post(
    "../../controller/controller.php?op=mostrar",
    {id_producto: id_producto},
    function(data){
      data=JSON.parse(data);
      //console.log(data);
      $('#id_producto').val(data.id_producto);
      $('#id_categoria').val(data.id_categoria).trigger('change');
      $('#Nombre_producto').val(data.Nombre_producto);
      $('#Descripcion_producto').val(data.Descripcion_producto);
      $('#Precio_producto').val(data.Precio_producto);
      $('#Stock_producto').val(data.Stock_producto);
    }
  );
  $("#mdltitulo").html('Editar Registro');
  $("#modalmantenimiento").modal("show");
}
function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#producto_form")[0]);
  $.ajax({
    url: "../../controller/controller.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
      $("#producto_form")[0].reset();
      $("#modalmantenimiento").modal("hide");
      $("#productos_data").DataTable().ajax.reload();
      /**Colocar un mensaje del MODAL*/
      swal.fire("Registro!", "Se registro correctamente.", "success");
    },
  });
}
function eliminar(id_producto) {
  /**Se agrego el modal */
  swal
    .fire({
      title: "CURD",
      text: "Desea Eliminar el Registro?",
      icon: "error",
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        //console.log(id_producto);
        $.post(
          "../../controller/controller.php?op=eliminar",
          { id_producto: id_producto },
          function (data) {}
        );
        $("#productos_data").DataTable().ajax.reload();
        swal.fire({
          title: "Eliminado!",
          text: "El registro se elimino correctamente.",
          icon: "success",
        });
      }
    });
}


$(document).on("click", "#btnnuevo", function () {
  $("#id_producto").val('');
  $("#modalmantenimiento").modal("show");
  $("#mdltitulo").html("Nuevo Registro");
});
init();
