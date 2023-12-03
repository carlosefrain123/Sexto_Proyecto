<?php
    class Producto extends BD{
        public function get_producto(){
            $conectar=parent::Conexion();
            $sql=$conectar->prepare("SELECT * FROM producto WHERE estado=1");
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_producto_x_id($id_producto){
            $conectar=parent::Conexion();
            $sql=$conectar->prepare("SELECT * FROM producto WHERE $id_producto=?");
            $sql->bindValue(1,$id_producto);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>