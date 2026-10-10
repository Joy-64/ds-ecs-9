<?php require_once '../../modelo/persona.php'; 
$id = $_GET['id'] ?? null;
$persona = $id ? Persona::obtenerPorId($id) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Persona</h1>

                <?php if ($persona): ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $persona->id; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $persona->nombre; ?></p>
                        <p><strong>Email:</strong> <?php echo $persona->email; ?></p>
                        <p><strong>Edad:</strong> <?php echo $persona->edad; ?></p>
                        <p><strong>Profesión:</strong> <?php echo htmlspecialchars($persona->getProfesion()->nombre, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                    <a href="editar.php?id=<?php echo $persona->id; ?>" class="btn btn-warning">Editar</a>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Persona no encontrada</div>
                <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
