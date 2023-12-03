<?php
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
            /**$sub_array[] = '<button type="button" onClick="editar(' . $row["id_producto"] . ');"  id="' . $row["id_producto"] . '" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id_producto"] . ');"  id="' . $row["id_producto"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>'; */
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

    default:
        # code...
        break;
}

