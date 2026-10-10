<?php
require_once __DIR__ . '/../core/Database.php';

class Profesion {
    public $Id;
    public $Nombre;

    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query('SELECT id, nombre FROM profesiones ORDER BY nombre');
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        } catch (PDOException $e) {
            error_log("Error al obtener profesiones: " . $e->getMessage());
            throw $e;
        }
    }

    public static function obtenerPorId($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT id, nombre FROM profesiones WHERE id = :id');
            $stmt->execute([':id' => $id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener profesion: " . $e->getMessage());
            throw $e;
        }
    }

    public static function agregar($nombre) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO profesiones (nombre) VALUES (:nombre)');
            
            return $stmt->execute([
                ':nombre' => $Nombre,
                
             
            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar profesion: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Editar una persona existente
     */
    public static function editar($id, $nombre) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE profesiones SET nombre = :nombre  WHERE id = :id');
            
            return $stmt->execute([
                ':id' => $Id,
                ':nombre' => $Nombre,
            ]);
        } catch (PDOException $e) {
            error_log("Error al editar profesion: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una persona
     */
    public static function eliminar($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM profesiones WHERE id = :id');
            
            return $stmt->execute([':id' => $Id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar profesion: " . $e->getMessage());
            return false;
        }
    }
}

