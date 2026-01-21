<?php?>

<h1>Deletar post</h1>
<div class="error">
    <p>
        Voce tem certeza que deseja deletar 
        <strong>
            <?= e($post['title'])?>
        </strong>
    </p>
</div>
<form action="post" action="<?= e(BASE_URL)?>/index.php?action=delete">
    <input type="hidden" name="csrf" value="<?= e(csrf_token())?>">
    <input type="hidden" name="id" value="<?=(int) $post['id']?>">
    <button class="btn danger" type="submit">
        Sim, deletar.
    </button>
    <a href="<?= e(BASE_URL)?>" class="btn">Cancelar</a>
</form>