<head>
    <title>Registro</title>
</head>

<?= $this->include('partials/header') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8 col-sm-8 col-md-6 col-lg-4 bg-white shadow-lg rounded p-4 mb-5">
            <h2 class="mb-4 text-center">Registro de Usuario</h2>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= site_url('auth/register') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Crear cuenta</button>

                <p class="text-center mt-3">¿Ya tienes cuenta? <a href="<?= base_url('auth/login') ?>">Inicia sesión</a></p>
            </form>
        </div>
    </div>
</div>

<?= $this->include('partials/footer') ?>