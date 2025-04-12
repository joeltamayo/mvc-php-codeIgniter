<?= $this->include('partials/header'); ?>

<div class="container mt-5">
    <h2>Subir Imagen</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form action="<?= site_url('gallery/upload') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="image">Selecciona una imagen:</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir Imagen</button>
    </form>
</div>

<?= $this->include('partials/footer'); ?>