<head>
    <title>Iniciar Sesión</title>
</head>

<?= $this->include('partials/header') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8 col-sm-8 col-md-6 col-lg-4 bg-white shadow-lg rounded p-4 mb-5">
            <h2 class="mb-4 text-center">Iniciar Sesión</h2>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= site_url('auth/login') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Tu email" value="<?= esc($rememberedEmail ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Tu contraseña" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="keep_logged_in" id="keep_logged_in">
                    <label class="form-check-label" for="keep_logged_in">
                        Recordar correo
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                <p class="text-center mt-3">¿No tienes cuenta? <a href="<?= base_url('auth/register') ?>">Regístrate aquí</a></p>
            </form>
        </div>
    </div>
</div>

<?= $this->include('partials/footer') ?>