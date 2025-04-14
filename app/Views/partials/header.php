<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Integradora - MVC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Galería MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (session()->get('logged_in')): ?>
                        <?php if (session()->get('role') === 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user/list') ?>">Usuarios</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('gallery') ?>">Galería</a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/profile') ?>">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout') ?>">Cerrar sesión</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/login') ?>">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/register') ?>">Registrarse</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-fill" style="background-color: whitesmoke;">