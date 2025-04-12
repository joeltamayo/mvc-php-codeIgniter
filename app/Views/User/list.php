<head>
    <title>Lista de Usuarios</title>
</head>

<?= $this->include('partials/header'); ?>

    <div class="container bg-white shadow-lg rounded p-4 mt-5 min-vh-50 w-75">
    <h2 class="mb-2">Usuarios</h2>
        <a href="<?= base_url('user/create') ?>" class="btn btn-success mb-3">Crear nuevo usuario</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre de usuario</th>
                    <th>Correo electrónico</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $this->include('partials/footer'); ?>
