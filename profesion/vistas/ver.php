<?php require_once '../../modelo/profesion.php'; 
$id = $_GET['id'] ?? null;
$profesion = $id ? Profesion::obtenerPorId($id) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Profesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Profesion</h1>

                <?php if ($profesion): ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $profesion->id; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $profesion->nombre; ?></p>
                      
                    </div>
                </div>

                <div class="mt-3">
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                    <a href="editar.php?id=<?php echo $profesion->id; ?>" class="btn btn-warning">Editar</a>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Profesion no encontrada</div>
                <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>