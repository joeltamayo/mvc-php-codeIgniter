<head>
    <title>Perfil</title>
</head>

<?= $this->include('partials/header'); ?>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="col-11 col-sm-12 col-md-8 col-lg-6 bg-white shadow-lg rounded p-4">
        <h2 class="text-center mb-4">Mi perfil</h2>
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title"><?= esc($user['username']) ?></h5>
                <p class="card-text">Correo: <?= esc($user['email']) ?></p>
                <p class="card-text">Rol: <?= esc($user['role']) ?></p>
                <div class="d-flex justify-content-center">
                    <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-primary m-1">Editar perfil</a>
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger m-1">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/footer'); ?>