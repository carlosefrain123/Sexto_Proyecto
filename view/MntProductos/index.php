<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once("C:/xampp/htdocs/proyectf/view/MntProductos/head.php");
    ?>
</head>

<body>

    <?php
    require_once("C:/xampp/htdocs/proyectf/view/MntProductos/leftPanel.php");
    require_once("C:/xampp/htdocs/proyectf/view/MntProductos/headPanel.php");
    require_once("C:/xampp/htdocs/proyectf/view/MntProductos/rigthPanel.php");
    ?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="index.html">Mantenimiento</a>
                <span class="breadcrumb-item active">Producto</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Producto</h4>
            <p class="mg-b-0">Desde esta ventana podra se mantenimiento.</p>
        </div>

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Mantenimiento de producto</h6>
                <div class="table-wrapper">
                    <table id="productos_data" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Nombre</th>
                                <th class="wd-15p">Descripción</th>
                                <th class="wd-20p">Precio</th>
                                <th class="wd-20p">Stock</th>
                                <th class="wd-20p">Funciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- br-pagebody -->
            </div><!-- br-mainpanel -->
        </div><!-- br-mainpanel -->
    </div><!-- br-mainpanel -->

    <!-- ########## END: MAIN PANEL ########## -->
    <?php
    require_once("C:/xampp/htdocs/proyectf/view/MntProductos/mntpJS.php");
    ?>
</body>

</html>