<div class="container">
    <h2>Actualizar publicación</h2>
    <form method="post" action="<?= base_url('publication/edit/' . $post['id']) ?>">
        <div class="form-group">
            <input type="hidden" name="id" value=" <?= $post['id'] ?>">
            <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"> <?= $post['content'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>

    <br>

</div>