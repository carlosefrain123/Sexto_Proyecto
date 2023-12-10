<?php
class Categoria extends BD
{
    //TODO: Obtener todas los registros de la tabla categoria
    public function get_categoria()
    {
        $conectar = parent::Conexion();
        $sql = $conectar->prepare("SELECT * FROM categoria WHERE estado=1");
        return ($sql->execute()) ? $sql->fetchAll() : null;
    }
}
