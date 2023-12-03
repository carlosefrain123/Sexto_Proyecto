<?php
    class Producto extends BD{
        public function get_producto(){
            $conectar=parent::Conexion();
            $sql=$conectar->prepare("SELECT * FROM producto WHERE estado=1");
            return ($sql->execute())?$sql->fetchAll():null;
            //$sql->execute();
            //return $resultado=$sql->fetchAll();
        }
        public function get_producto_x_id($id_producto){
            $conectar=parent::Conexion();
            $sql=$conectar->prepare("SELECT * FROM producto WHERE $id_producto=:id_producto");
            $sql->bindParam(":id_producto",$id_producto);
            return ($sql->execute())?$sql->fetchAll():null;
            //$sql->bindValue(1,$id_producto);
            //$sql->execute();
            //return $resultado=$sql->fetchAll();
        }
    }
?>