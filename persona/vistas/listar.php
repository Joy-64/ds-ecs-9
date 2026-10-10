<?php require_once '../../modelo/persona.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h1>Personas</h1>
            </div>
            <div class="col text-end">
                <a href="editar.php" class="btn btn-success">+ Agregar</a>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $personas = Persona::obtenerTodas(); foreach ($personas as $p): ?>
                <tr>
                    <td><?php echo $p->id; ?></td>
                    <td><?php echo $p->nombre; ?></td>
                    <td><?php echo $p->email; ?></td>
                    <td><?php echo $p->edad; ?></td>
                    <td><?php echo htmlspecialchars($p->getProfesion()->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="ver.php?id=<?php echo $p->id; ?>" class="btn btn-sm btn-primary">Ver</a>
                        <a href="editar.php?id=<?php echo $p->id; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <form method="POST" action="../acciones.php" style="display:inline;">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
