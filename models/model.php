<?php
class Producto extends BD
{
    public function get_producto()
    {
        $conectar = parent::Conexion();
        $sql = $conectar->prepare("SELECT * FROM producto WHERE estado=1");
        return ($sql->execute()) ? $sql->fetchAll() : null;
    }

    public function get_producto_x_id($id_producto)
    {
        $conectar = parent::Conexion();
        $sql = $conectar->prepare("SELECT * FROM producto WHERE id_producto=:id_producto");
        $sql->bindParam(":id_producto", $id_producto);
        return ($sql->execute()) ? $sql->fetchAll() : null;
    }

    public function insert_producto($Nombre_producto, $Descripcion_producto, $Precio_producto, $Stock_producto)
    {
        $conectar = parent::Conexion();
        $sql = "INSERT INTO producto (id_producto, Nombre_producto, Descripcion_producto, Precio_producto, Stock_producto, fecha_creacion, fecha_modificacion, fecha_eliminar, estado) VALUES (NULL, :Nombre_producto, :Descripcion_producto, :Precio_producto, :Stock_producto, NOW(), NULL, NULL, 1)";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(":Nombre_producto", $Nombre_producto);
        $sql->bindParam(":Descripcion_producto", $Descripcion_producto);
        $sql->bindParam(":Precio_producto", $Precio_producto);
        $sql->bindParam(":Stock_producto", $Stock_producto);

        // Ejecuta la consulta y devuelve true si la inserción fue exitosa
        return $sql->execute();
    }

    public function delete_producto($id_producto)
    {
        $conectar = parent::Conexion();
        $sql = $conectar->prepare("UPDATE producto SET estado=0, fecha_eliminar=NOW() WHERE id_producto=:id_producto");
        $sql->bindParam(':id_producto', $id_producto);
        return $sql->execute();
    }

    public function edite_producto($id_producto, $Nombre_producto, $Descripcion_producto, $Precio_producto, $Stock_producto)
    {
        $conexion = parent::Conexion();
        $sql = $conexion->prepare("UPDATE producto SET Nombre_producto=:Nombre_producto, Descripcion_producto=:Descripcion_producto, Precio_producto=:Precio_producto, Stock_producto=:Stock_producto, fecha_modificacion=NOW() WHERE id_producto=:id_producto");
        $sql->bindParam(":id_producto", $id_producto);
        $sql->bindParam(":Nombre_producto", $Nombre_producto);
        $sql->bindParam(":Descripcion_producto", $Descripcion_producto);
        $sql->bindParam(":Precio_producto", $Precio_producto);
        $sql->bindParam(":Stock_producto", $Stock_producto);
        return $sql->execute();
    }
}
