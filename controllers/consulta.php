<?php

class Consulta extends Controller {

    function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
    }

    function render(){
        $items = $this->model->listAll();
        $this->view->datos =  $items;
        $this->view->render('consulta/index');
    }

    function verItem($param = null) {
        $idItem = $param[0];
        $item = $this->model->getById($idItem);
        session_start();
        $_SESSION['id_verItem'] = $item->id;
        $this->view->item = $item;
        $this->view->mensaje = '';
        $this->view->render('consulta/detalle');
    }

    function actualizarItem() {
        session_start();
        $datos = [
            'id' => $_SESSION['id_verItem'],
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'imagen' => $_POST['imagen'],
            'categoria' => $_POST['categoria']
        ];
        unset($_SESSION['id_verItem']);
        if($this->model->update($datos)){
            $item = new Item();
            $item->id = $datos['id'];
            $item->nombre = $datos['nombre'];
            $item->precio = $datos['precio'];
            $item->imagen = $datos['imagen'];
            $item->categoria = $datos['categoria'];
            
            $this->view->item = $item;
            $this->view->mensaje = 'Item actualizado correctamente';
        }else {
            //mensaje de error
            $this->view->mensaje = 'Hubo un error';
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarItem($param = null) {
        $id = $param[0];
        if($this->model->delete($id)){
            $mensaje = 'Alumno eliminado correctamente';
        }else {
            $mensaje = 'No se pudo eliminar correctamente';
        }
        echo $mensaje;
    }

}