<?php require_once '../../modelo/persona.php'; 
require_once '../../modelo/profesion.php';
$id = $_GET['id'] ?? null;
$persona = $id ? Persona::obtenerPorId($id) : null;
$titulo = $persona ? 'Editar Persona' : 'Agregar Persona';
$accion = $persona ? 'editar' : 'agregar';
$errorProfesiones = null;
try {
    $profesiones = Profesion::obtenerTodas();
    if (!$profesiones) {
        $errorProfesiones = 'No hay profesiones disponibles. Cargue las profesiones en la base de datos antes de guardar.';
    }
} catch (PDOException $e) {
    $profesiones = [];
    $errorProfesiones = 'No se pudieron cargar las profesiones. Intente nuevamente.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $titulo; ?></h1>
                <?php if ($errorProfesiones): ?>
                <div class="alert alert-danger" role="alert"><?php echo $errorProfesiones; ?></div>
                <?php endif; ?>

                <form method="POST" action="../acciones.php">
                    <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                    <?php if ($persona): ?>
                    <input type="hidden" name="id" value="<?php echo $persona->id; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $persona ? $persona->nombre : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $persona ? $persona->email : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Edad</label>
                        <input type="number" class="form-control" name="edad" value="<?php echo $persona ? $persona->edad : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="profesion_id" class="form-label">Profesión</label>
                        <select id="profesion_id" name="profesion_id" class="form-select" required <?php echo $errorProfesiones ? 'disabled' : ''; ?>>
                            <option value="" disabled <?php echo $persona ? '' : 'selected'; ?>>Seleccione una profesión</option>
                            <?php foreach ($profesiones as $profesion): ?>
                            <option value="<?php echo $profesion->id; ?>" <?php echo $persona && (int) $persona->profesion_id === (int) $profesion->id ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($profesion->nombre, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="submit" class="btn btn-primary" <?php echo $errorProfesiones ? 'disabled' : ''; ?>>Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
