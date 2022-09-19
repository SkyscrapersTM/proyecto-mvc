<?php

include 'models/item.php';

class ConsultaModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function listAll() {
        //Insertar datos en la bd
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM items');
            while($row = $query->fetch()){
                $item = new Item();
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->precio = $row['precio'];
                $item->categoria = $row['categoria'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getById($id) {
        $item = new Item();
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM items where id = :id');
            $query->execute(['id' => $id]);
            $row = $query->fetch();

            $item->id = $row['id'];
            $item->nombre = $row['nombre'];
            $item->precio = $row['precio'];
            $item->imagen = $row['imagen'];
            $item->categoria = $row['categoria'];

            return $item;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($datos) {
        $query = $this->db->connect()->prepare('UPDATE items SET
                                        nombre = :nombre, precio = :precio,
                                        imagen = :imagen, categoria = :categoria
                                        WHERE id = :id');
        try {
            $query->execute($datos);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }                                       
    }

    public function delete($id){
        $query = $this->db->connect()->prepare('DELETE FROM items WHERE id = :id');
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}