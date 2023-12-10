<?php
require_once("C:/xampp/htdocs/proyectf/config/conexion.php");
require_once("C:/xampp/htdocs/proyectf/models/categoria.php");
$obj_categoria = new Categoria();
switch ($_GET['op']) {
    case 'combo':
        $datos=$obj_categoria->get_categoria();
        if (is_array($datos) && count($datos) > 0) {
            $html = "<option label='Seleccione'></option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row["id_categoria"] . "'>" . $row["categoria_nombre"] . "</option>";
            }
            echo $html;
        } else {
            echo "No se encontraron categorías"; // Agrega un mensaje de prueba
        }
        break;
}
