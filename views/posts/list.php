<?php?>
<h1>Posts</h1>
<?php require __DIR__ . '/../partials/flash.php'; ?>

<?php if (empty(($posts))): ?>
    <p>
        Sem posts ainda.
        <a class="btn primary" href="<?= e(BASE_URL)?>/index.php?action=create">
            Crie seu primeiro post!
        </a>
    </p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th style="width: 64px;">ID</th>
                <th>Titulo</th>
                <th style="width: 200px;">Criado</th>
                <th style="width: 200px;">Ações</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td>
                            <?= (int)$post['id'] ?>
                        </td>
                        <td>
                            <strong>
                                <?= e($post['title'])?>
                            </strong>
                            <small class="muted">
                                <?=nl2br(e(mb_strimwidth($post['body'], 0, 120,'...')))?>_
                            </small>
                        </td>
                        <td>
                            <?= e($post['created_at'])?>
                        </td>
                        <td class="actions">
                            <a href="<?= e(BASE_URL)?>/index.php?action=edit&id=<?=(int)$post['id']?>" class="btn">Editar</a>
                            <a href="<?= e(BASE_URL)?>/index.php?action=delete_confirm&id=<?=(int)$post['id']?>" class="danger">Deletar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
    </table>
<?php endif; ?>