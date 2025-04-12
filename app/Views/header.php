<!-- app/Views/partials/header.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.3. Desarrollo de aplicaciones usando el patrón de diseño MVC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('user/list') ?>">4.3. Desarrollo de aplicaciones usando el patrón de diseño MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link text-white" href="<?= base_url('user/list') ?>">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('user/create') ?>">Crear Usuario</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="flex-fill">