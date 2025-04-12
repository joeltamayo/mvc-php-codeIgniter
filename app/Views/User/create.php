<head>
    <title>Crear Usuario</title>
</head>

<body>

    <?= $this->include('partials/header'); ?>

    <div class="container bg-white shadow-lg rounded p-4 mt-5 min-vh-50 w-75">
        <h2 class="mt-2">Crear nuevo usuario</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('user/create') ?>" method="POST">
            <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
            <label for="role">Rol</label>
            <select class="form-control" id="role" name="role" required>
                <option value="user" selected>Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

            <button type="submit" class="btn btn-primary">Crear usuario</button>
        </form>
    </div>

    <?php // Mensaje de error (correo ya registrado  )
    if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?= $this->include('partials/footer'); ?>