<?php

include 'models/item.php';
include 'models/session.php';

class CarritoModel extends Session {

    public function __construct()
    {
        parent::__construct('carrito');
    }

    public function getById($id){
        $query = $this->db->connect()->prepare('SELECT * FROM items WHERE id = :id LIMIT 0,12');
        $query->execute(['id' => $id]);

        $row = $query->fetch();

        return [
            'id'        => $row['id'],
            'nombre'    => $row['nombre'],
            'precio'    => $row['precio'],
            'imagen'    => $row['imagen'],
            'categoria' => $row['categoria']
        ];
    }


    public function listAll() {
        //Insertar datos en la bd
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM items');
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new Item();
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->precio = $row['precio'];
                $item->imagen = $row['imagen'];
                $item->categoria = $row['categoria'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function load() {
        if($this->getValue() == NULL){
            return [];
        }

        return $this->getValue();
    }

    public function add($id){
        if($this->getValue() == NULL){
            $items = [];
        }else{
            $items = json_decode($this->getValue(), 1);

            for($i=0; $i<sizeof($items); $i++){
                if($items[$i]['id'] == $id){
                    $items[$i]['cantidad']++;
                    $this->setValue(json_encode($items));

                    return $this->getValue();
                }
            }
        }

        // operaciones cuando el carrito tiene un nuevo elemento
        $item = ['id' => (int)$id, 'cantidad' => 1];

        array_push($items, $item);

        $this->setValue(json_encode($items));

        return $this->getValue();
    }

    public function remove($id){
        if($this->getValue() == NULL){
            $items = [];
        }else{
            $items = json_decode($this->getValue(), 1);

            for($i =0; $i< sizeof($items); $i++){

                if($items[$i]['id'] == $id){
                    $items[$i]['cantidad']--;

                    if($items[$i]['cantidad'] == 0){
                        unset($items[$i]);
                        $items = array_values($items);
                    }

                    $this->setValue(json_encode($items));
                    return true;
                }
            }
        }
    }
   
}