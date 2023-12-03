<?php
class BD{
    protected $dbh;
    protected function Conexion(){
        try {
            $conectar=$this->dbh=new PDO("mysql:host=localhost;dbname=practicf","root","");
            return $conectar;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }
}
?>