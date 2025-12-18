<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Mascotas</h1>
        <a href="<?= site_url('mascotas/create') ?>" class="btn btn-primary mb-3">Agregar Mascota</a>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Edad</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($mascotas)): ?>
                    <?php foreach($mascotas as $mascota): ?>
                        <tr>
                            <td><?= $mascota['id'] ?></td>
                            <td><?= $mascota['nombre'] ?></td>
                            <td><?= $mascota['tipo'] ?></td>
                            <td><?= $mascota['edad'] ?></td>
                            <td><?= $mascota['descripcion'] ?></td>
                            <td>
                                <a href="<?= site_url('mascotas/edit/' . $mascota['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="<?= site_url('mascotas/delete/' . $mascota['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta mascota?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay mascotas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
