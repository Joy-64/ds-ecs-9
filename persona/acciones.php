<?php
require_once '../modelo/persona.php';
require_once '../modelo/profesion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $edad = $_POST['edad'] ?? '';
    $id = $_POST['id'] ?? '';
    $profesion_id = $_POST['profesion_id'] ?? '';

    if ($accion === 'agregar') {
        if (!Persona::agregar($nombre, $email, $edad, $profesion_id)) {
            http_response_code(500);
            exit('No se pudo agregar la persona. Revise los datos e intente nuevamente.');
        }
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'editar') {
        if (!Persona::editar($id, $nombre, $email, $edad, $profesion_id)) {
            http_response_code(500);
            exit('No se pudo editar la persona. Revise los datos e intente nuevamente.');
        }
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'eliminar') {
        Persona::eliminar($id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>
