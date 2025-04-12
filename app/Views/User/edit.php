<head>
    <title>Editar Usuario</title>
</head>

<?= $this->include('partials/header'); ?>

<div class="container bg-white shadow-lg rounded p-4 mt-5 min-vh-50 w-75">
    <h2 class="mt-2">Editar usuario</h2>
    <form action="<?= base_url('user/edit/' . $user['id']) ?>" method="POST">
        <?= csrf_field(); ?>

        <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']) ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= esc($user['password']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
    </form>
</div>

<?= $this->include('partials/footer'); ?>
