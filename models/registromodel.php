<?php

class RegistroModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos) {
        //Insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare('INSERT INTO items (nombre, precio, imagen, categoria) values (:nombre, :precio, :imagen, :categoria)');
            $query->execute($datos);
            return true;        
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}