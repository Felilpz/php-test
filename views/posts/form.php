<?php

$isEdit = ($mode === 'edit');

$title = $isEdit ? 'Edit Post' : 'New Post';

?>

<h1>
    <?= e('title')?>
</h1>
<?php require __DIR__ .'/../partials/flash.php';?>;
<?php if($errors): ?>
    <div class="error">
        <strong>
            Tivemos algusn imprevistos
        </strong>
        <ul>
            <?php foreach($errors as $msg): ?>
            <li>
                <?= e($msg)?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="post" action="<?= e(BASE_URL)?>/index.php?action=<? $isEdit ? 'update' : 'store' ?>">
    <input type="hidden" name="csrf" value="<?= e(csrf_token())?>">
    <?php if($isEdit): ?>
        <input type="hidden" name="id" value="<?= (int) $values['id']?>">
    <?php endif;?>
    <label for="title">TItulo</label>
    <input type="text" name="title" id="title" value="<?= e($values['title']) ?? ''?>" maxlength="255" required>
    <label for="body">Body</label>
    <textarea name="body" id="body" rows="8" required>
        <?= e($values['body'] ?? '')?>
    </textarea>
    <p style="margin-top: 12px;">
        <button class="btn primary" type="submit">
            <?= $isEdit ? 'Salvar mudanças': 'Criar post'?>
        </button>
        <a class="btn" href="<?= e(BASE_URL)?>">Cancelar</a>
    </p>
</form>
    