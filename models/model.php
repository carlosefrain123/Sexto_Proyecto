<?php
class Producto extends BD
{
    public function get_producto()
    {
        $conectar = parent::Conexion();
        $sql = $conectar->prepare("SELECT producto.id_producto, producto.id_categoria, producto.Nombre_producto, producto.Descripcion_producto, producto.Precio_producto, producto.Stock_producto, categoria.categoria_nombre FROM producto INNER JOIN categoria on producto.id_categoria=categoria.id_categoria WHERE producto.estado=1;");
        return ($sql->execute()) ? $sql->fetchAll() : null;
    }

    public function get_producto_x_id($id_producto)
    {
        $conectar = parent::Conexion();
        $sql = $conectar->prepare("SELECT * FROM producto WHERE id_producto=:id_producto");
        $sql->bindParam(":id_producto", $id_producto);
        return ($sql->execute()) ? $sql->fetchAll() : null;
    }

    public function insert_producto($id_categoria,$Nombre_producto, $Descripcion_producto, $Precio_producto, $Stock_producto)
    {
        $conectar = parent::Conexion();
        $sql = "INSERT INTO producto (id_producto,id_categoria, Nombre_producto, Descripcion_producto, Precio_producto, Stock_producto, fecha_creacion, fecha_modificacion, fecha_eliminar, estado) VALUES (NULL,:id_categoria, :Nombre_producto, :Descripcion_producto, :Precio_producto, :Stock_producto, NOW(), NULL, NULL, 1)";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(":id_categoria",$id_categoria);
        $sql->bindParam(":Nombre_producto", $Nombre_producto);
        $sql->bindParam(":Descripcion_producto", $Descripcion_producto);
        $sql->bindParam(":Precio_producto", $Precio_producto);
        $sql->bindParam(":Stock_producto", $Stock_producto);

        //TODOS: Ejecuta la consulta y devuelve true si la inserción fue exitosa
        return $sql->execute();
    }

    public function delete_producto($id_producto)
    {
        $conectar = parent::Conexion();
        $sql = $conectar->prepare("UPDATE producto SET estado=0, fecha_eliminar=NOW() WHERE id_producto=:id_producto");
        $sql->bindParam(':id_producto', $id_producto);
        return $sql->execute();
    }

    public function edite_producto($id_producto,$id_categoria, $Nombre_producto, $Descripcion_producto, $Precio_producto, $Stock_producto)
    {
        $conexion = parent::Conexion();
        $sql = $conexion->prepare("UPDATE producto SET 
        id_categoria=:id_categoria,
        Nombre_producto=:Nombre_producto, Descripcion_producto=:Descripcion_producto, Precio_producto=:Precio_producto, Stock_producto=:Stock_producto, fecha_modificacion=NOW() WHERE id_producto=:id_producto");
        $sql->bindParam(":id_categoria",$id_categoria);
        $sql->bindParam(":id_producto", $id_producto);
        $sql->bindParam(":Nombre_producto", $Nombre_producto);
        $sql->bindParam(":Descripcion_producto", $Descripcion_producto);
        $sql->bindParam(":Precio_producto", $Precio_producto);
        $sql->bindParam(":Stock_producto", $Stock_producto);
        return $sql->execute();
    }
    /* public function edite_producto($id_producto, $Nombre_producto, $Descripcion_producto, $Precio_producto, $Stock_producto)
    {
        $conectar=parent::Conexion();
        $sql = "UPDATE producto
            SET
                Nombre_producto = ?,
                Descripcion_producto = ?,
                Precio_producto = ?,
                Stock_producto = ?,
                fecha_modificacion = NOW()
            WHERE
                id_producto = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$Nombre_producto);
        $sql->bindValue(2,$Descripcion_producto);
        $sql->bindValue(3,$Precio_producto);
        $sql->bindValue(4,$Stock_producto);
        $sql->bindValue(5,$id_producto);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */
}
