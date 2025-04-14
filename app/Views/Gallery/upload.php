<head>
    <title>Subir</title>
</head>

<?= $this->include('partials/header'); ?>

<div class="container mt-5 d-flex justify-content-center align-items-center">
    <div class="col-11 col-sm-12 col-md-10 col-lg-8 bg-white shadow-lg rounded p-4 mb-2">

        <h2 class="mb-4 text-center">Subir imagen</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('gallery/upload') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group mb-4">
                <label for="image">Selecciona una imagen:</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Subir imagen</button>
        </form>
    </div>
</div>

<?= $this->include('partials/footer'); ?>