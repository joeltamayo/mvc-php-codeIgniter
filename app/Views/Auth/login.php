<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <h2>Iniciar Sesión</h2>
        <form action="<?= site_url('auth/login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Tu email" value="<?= esc($rememberedEmail ?? '') ?>" required>
            </div>
            <div class=" form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Tu contraseña" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="keep_logged_in" id="keep_logged_in">
                <label class="form-check-label" for="keep_logged_in">
                    Recordar
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</body>

</html>