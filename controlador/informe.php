<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/informe.php");

    $control = $_GET['control'];

    $informe = new Informe( $conexion);

    switch ($control) {
        case 'consulta':
            $vec = $informe->consulta();
        break;
        case 'insertar':
            //$json = file_get_contents('php://input');
            $json = '{"nombre":"prueba"}';
            $params = json_decode($json);
            $vec = $informe->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $informe->eliminar($id);
        break;
        case 'editar':
            //$json = file_get_contents('php://input');
            $json = '{"nombre":"prueba"}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $informe->editar($id, $params);
        break; 
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $informe->filtro($dato);
        break;    
              
                 
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

?>
