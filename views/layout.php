<?php?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= e($title ?? 'Crud Demo')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; margin: 0; padding: 0; }
        header { background:#111; color:#fff; padding:16px 24px; }
        header a { color:#fff; text-decoration:none; margin-right:12px; }
        main { max-width: 860px; margin: 24px auto; padding: 0 16px; }
        .btn { display:inline-block; padding:8px 12px; text-decoration:none; border:1px solid #222; border-radius:6px; }
        .btn.primary { background:#222; color:#fff; }
        .btn.danger { border-color:#b00020; color:#b00020; }
        table { width:100%; border-collapse: collapse; margin-top: 12px; }
        th, td { text-align:left; border-bottom:1px solid #eee; padding:8px; vertical-align: top; }
        form label { display:block; margin: 12px 0 4px; font-weight:600; }
        input[type="text"], textarea { width:100%; padding:8px; border:1px solid #ccc; border-radius:6px; font:inherit; }
        .error { background:#fff3f3; color:#b00020; padding:8px 12px; border:1px solid #ffd6d6; border-radius:6px; margin-bottom:8px; }
        .flash { background:#f0f9ff; color:#084c7f; border:1px solid #cae9ff; padding:8px 12px; border-radius:6px; margin: 12px 0; }
        .actions a { margin-right:8px; }
        small.muted { color:#666; }
    </style>
</head>
<body>
    <header>
        <a href="<?= e(BASE_URL)?>">Home</a>
        <a href="<?= e(BASE_URL)?>/index.php?action=create">New Post</a>
    </header>
    <main>
        <?= $content?>
    </main>
</body>
</html>