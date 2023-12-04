<?php
require_once("C:/xampp/htdocs/proyectf/config/conexion.php");
require_once("C:/xampp/htdocs/proyectf/models/model.php");
$obj_producto = new Producto();
switch ($_GET['op']) {
    case 'listar':
        $datos = $obj_producto->get_producto();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row['Nombre_producto'];
            $sub_array[] = $row['Descripcion_producto'];
            $sub_array[] = $row['Precio_producto'];
            $sub_array[] = $row['Stock_producto'];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["id_producto"] . ');" id="' . $row["id_producto"] . '" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button> <button type="button" onClick="eliminar(' . $row["id_producto"] . ');" id="' . $row["id_producto"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
    case 'guardaryeditar':
        $datos = $obj_producto->get_producto_x_id($_POST['id_producto']);
        if (empty($_POST['id_producto'])) {
            if (is_array($datos) == true and count($datos) == 0) {
                $obj_producto->insert_producto($_POST['Nombre_producto'], $_POST['Descripcion_producto'], $_POST['Precio_producto'], $_POST['Stock_producto']);
            } else {
                $obj_producto->edite_producto($_POST['id_producto'], $_POST['Nombre_producto'], $_POST['Descripcion_producto'], $_POST['Precio_producto'], $_POST['Stock_producto']);
            }
        }
        break;
    case 'mostrar':
        $datos = $obj_producto->get_producto_x_id($_POST['id_producto']);
        if (empty($_POST['id_producto'])) {
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output['Nombre_producto'] = $row['Nombre_producto'];
                    $output['Descripcion_producto'] = $row['Descripcion_producto'];
                    $output['Precio_producto'] = $row['Precio_producto'];
                    $output['Stock_producto'] = $row['Stock_producto'];
                }
                echo json_encode($output);  // Agregar esta línea para devolver la respuesta al frontend
            }
        }
    case 'eliminar':
        $obj_producto->delete_producto($_POST['id_producto']);
        break;
}
