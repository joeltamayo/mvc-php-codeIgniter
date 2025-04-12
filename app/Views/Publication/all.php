<?php setlocale(LC_TIME, "esp"); //esto nos ayudara a poner fechas en español 
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="<?= base_url('publication/add') ?>" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Publicar</button>
            </form>
        </div>

        <div class="col-md-6">
            <?php foreach ($posts as $item): ?>
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <strong>Usuario</strong>
                        <small> <?= strftime("%A, %d de %B de %Y %I:%M", strtotime($item['posted_time'])); ?></small>
                        <p class="card-text"><?= $item['content']; ?></p>
                        <a class="btn btn-warning" href="<?= base_url('publication/edit/' . $item['id']) ?>" role="button">Editar</a>
                        <a class="btn btn-danger" href="<?= base_url('publication/delete/' . $item['id']) ?>" role="button">Borrar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php if (empty($posts)): ?>
    <div class="alert alert-info text-center">Aún no hay publicaciones. ¡Escribe la primera!</div>
<?php endif; ?>