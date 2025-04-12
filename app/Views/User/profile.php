<?= $this->include('partials/header'); ?>

<div class="container mt-5">
    <h2>Mi Perfil</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= esc($user['username']) ?></h5>
            <p class="card-text">Correo: <?= esc($user['email']) ?></p>
            <p class="card-text">Rol: <?= esc($user['role']) ?></p>
            <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-primary">Editar perfil</a>
            <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>
</div>

<?= $this->include('partials/footer'); ?>
