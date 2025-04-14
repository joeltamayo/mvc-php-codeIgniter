<head>
    <title>Galeria</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/gallery.css') ?>">
</head>

<?= $this->include('partials/header'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-12 col-md-10 col-lg-10 bg-white shadow-lg rounded p-4 mb-5">

            <h2 class="mb-3">Mi Galería</h2>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
                <a href="<?= site_url('gallery/upload') ?>" class="btn btn-success">Subir imagen</a>

                <form action="<?= site_url('gallery') ?>" method="get" class="form-inline d-flex align-items-center gap-2">
                    <label for="order" class="me-2 mb-0">Ordenar por fecha:</label>
                    <select name="order" id="order" class="form-control me-2">
                        <option value="desc" <?= ($order == 'desc' ? 'selected' : '') ?>>Más recientes primero</option>
                        <option value="asc" <?= ($order == 'asc' ? 'selected' : '') ?>>Menos recientes primero</option>
                    </select>
                    <button type="submit" class="btn btn-primary mb-0">Ordenar</button>
                </form>
            </div>

            <?php if (!empty($images)): ?>
                <div class="row">
                    <?php foreach ($images as $img): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="<?= base_url($img['filename']) ?>" class="card-img-top" alt="Imagen de la Galería">
                                <div class="card-body p-2 text-center">
                                    <a href="<?= site_url('gallery/delete/' . $img['id']) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de borrar esta imagen?');"
                                        aria-label="Borrar esta imagen">
                                        Borrar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center">No hay imágenes subidas.</p>
            <?php endif; ?>

        </div>
    </div>
</div>

<?= $this->include('partials/footer'); ?>