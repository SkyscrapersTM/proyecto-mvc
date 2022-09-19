<?php 

class Carrito extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
    }

    function render(){
        $items = $this->model->listAll();
        $this->view->datos =  $items;
        $this->view->render('carrito/index');
    }

    function verItem($param = null) {
        $idItem = $param[0];
        $item = $this->model->getById($idItem);
        echo json_encode(['statuscode' => 200, 'item' => $item]);
    }

    function action($param = null) {

        if($param != null){
            $carrito = $this->model;
            $accion = $param[0];
            if(isset($param[1])){
                $id = $param[1];
    
                switch ($accion) {                    
                    case 'add':
                        add($carrito, $id);
                    break;
    
                    case 'remove':
                        remove($carrito, $id);
                    break;
    
                    default:
                        
                    break;
                }
            }else {
                if($accion == 'mostrar'){
                        mostrar($carrito);      
                }else {
                    echo json_encode(['statuscode' => 404, 'response' => 'No se encontro la pagina']);
                }   
            }
        }else {
            echo json_encode(['statuscode' => 404, 'response' => 'No se encontro la pagina']);
        }
    }

}

function mostrar($carrito){
    //cargar arreglo en la sesion
    // consultar DB para actualizar valores de los productos
    $itemsCarrito = json_decode($carrito->load(), 1);
    $fullItems = [];
    $total = 0;
    $totalItems = 0;

    foreach($itemsCarrito as $itemCarrito){
        $httpRequest = file_get_contents('http://localhost/php/proyecto-mvc/carrito/verItem/' . $itemCarrito['id']);
        $itemProducto = json_decode($httpRequest, 1)['item'];
        $itemProducto['cantidad'] = $itemCarrito['cantidad'];
        $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];

        $total += $itemProducto['subtotal'];
        $totalItems += $itemProducto['cantidad'];

        array_push($fullItems, $itemProducto);
    }
    $resArray = array('info' => ['count' => $totalItems, 'total' => $total], 'items' =>$fullItems);

    echo json_encode($resArray);
}

function add($carrito, $id) {
    $res = $carrito->add($id);
    echo $res;
}

function remove($carrito, $id){
    $res = $carrito->remove($id);
    echo json_encode(['statuscode' => 200]);
}

