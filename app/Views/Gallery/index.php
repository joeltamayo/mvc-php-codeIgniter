<head>
    <title>Galeria</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/gallery.css') ?>">
</head>

<?= $this->include('partials/header'); ?>

<div class="container mt-5">
    <h2>Mi Galería</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= site_url('gallery/upload') ?>" class="btn btn-success">Subir magen</a>
        <form action="<?= site_url('gallery') ?>" method="get" class="form-inline">
            <label class="mr-2" for="order">Ordenar por fecha:</label>
            <select name="order" id="order" class="form-control mr-2">
                <option value="desc" <?= ($order == 'desc' ? 'selected' : '') ?>>Más recientes primero</option>
                <option value="asc" <?= ($order == 'asc' ? 'selected' : '') ?>>Menos recientes primero</option>
            </select>
            <button type="submit" class="btn btn-primary">Ordenar</button>
        </form>
    </div>



    <?php if (!empty($images)): ?>
        <div class="row">
            <?php foreach ($images as $img): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="<?= base_url($img['filename']) ?>" class="card-img-top" alt="Imagen de la Galería">
                        <div class="card-body p-2">
                            <a href="<?= site_url('gallery/delete/' . $img['id']) ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de borrar esta imagen?');">
                                Borrar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No hay imágenes subidas.</p>
    <?php endif; ?>
</div>

<?= $this->include('partials/footer'); ?>