<?php
require_once '../modelo/profesion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $id = $_POST['id'] ?? '';

    if ($accion === 'agregar') {
        if (!Profesion::agregar($nombre)) {
            http_response_code(500);
            exit('No se pudo agregar la profesión.');
        }
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'editar') {
        if (!Profesion::editar($id, $nombre)) {
            http_response_code(500);
            exit('No se pudo editar la profesión.');
        }
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'eliminar') {
        Profesion::eliminar($id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>