<?php

class Registro extends Controller {

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = '';
    }

    function render(){
        $this->view->render('registro/index');
    }

    function registrarItem(){
        $datos = [
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'imagen' => $_POST['imagen'],
            'categoria' => $_POST['categoria']
        ];
        if($this->model->insert($datos)){
            $mensaje = 'Nuevo Item creado';
        }else {
            $mensaje ='Hubo un error';
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }

}