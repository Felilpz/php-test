<?php

    require_once __DIR__ .'/../db.php';
    require_once __DIR__ .'/../lib/helpers.php';
    require_csrf();
    $action = $_GET['action'] ?? 'list';

    switch($action) {
        case 'list':
            list_posts($pdo);
            break;
        case 'create':
            show_form();
            break;
        case 'store':
            store_post($pdo);
        case 'edit':
            edit_post($pdo);
            break;
        case 'update':
            update_post($pdo);
            break;
        case 'delete_confirm':
            delete_confirm($pdo);
            break;
        case 'delete_post':
            delete_post($pdo);
            break;
        default:
            http_response_code(404);
            echo "Não achei.";
}   

function render(string $view, array $vars = [], string $title = 'CRUD Demo'): void {
    extract ($vars);
    ob_start();
    require __dir__ ."/./views/$view.php;";
    $content = ob_get_clean();
    require __DIR__ ."/../views/layout.php";
}

function list_posts (PDO $pdo): void {
    $stmt = $pdo->query("select id, title, body, created_at from posts order by created_at desc");
    $posts = $stmt->fetchAll();
    render('posts/list', compact('posts'), 'Posts');
}

function show_form(array $values = [], array $errors = []): void {
    $mode = 'create';
    render('posts/form', compact('values', 'errors', 'mode'), 'New Post');
}

function store_post(PDO $pdo): void {
    $data = [
        'title' => $_POST['title'] ?? '',
        'body' => $_POST['body'] ?? '',
    ];
    
    $errors = validate_post($data, [
        'title' => ['required' => true, 'label' => 'Title', 'max' => 255],
        'body' => ['required'=> true, 'label'=> 'Body'],
    ]);
    
    if($errors) {
        show_form($data, $errors);
        return;
    }

    $sql = "INSERT INTO posts (title, body) values (:title, :body)";
    $stmt = $pdo->prepare($sql);
    $stmt-> execute([
        ':title' => $data['title'],
        ':body' => $data['body'],
    ]);
    flash('Sucesso', 'Post criado com sucesso.');
    redirect(BASE_URL .'./index.php');
}

function edit_post(PDO $pdo): void  {
    $id = (int)($_GET['id'] ?? 0);
    if($id <= 0) {
        flash("Error", "ID invalido");
        redirect(BASE_URL ."/index.php");
    }
    $stmt = $pdo->prepare("select id, title, body from posts where id = :id");
    $stmt->execute([':id' => $id]);
    $post = $stmt ->fetch();
    if(!$post) {
        flash('error', 'post nao encontrado.');
        redirect(BASE_URL .'/index.php');
    }
    $mode = 'edit';
    $values = $post;
    $errros = [];
    render('post/form', compact('values', 'errors', 'mode'), 'Edit post');
}

function update_post(PDO $pdo): void {
    $id = (int)($_POST['id'] ?? 0);
    if($id <= 0) {
        flash('errir', 'invalid id');
        redirect(BASE_URL .'/index.php');
    }

    $data = [
        'title' => $_POST['title'] ?? '',
        'body'=> $_POST['body'] ?? '',
    ];

    $errors = validate_post($data, [
        'title' => ['required' => true, 'label' => 'Title', 'max' => 255],
        'body' => ['required' => true, 'label'=> '', 'max'=> 'Body'],
    ]);

    $sql = "update posts set title = :title, body = :body where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute ([
        ':title' => $data['title'],
        ':body' => $data['body'],
        ':id' => $id,
    ]);
    flash('sucesss', 'post enviado com sucessooooo');
    redirect(BASE_URL .'/index.php');

    function delete_confirm(PDO $pdo): void {
        $id = (int)($_GET['id'] ?? 0);
        if($id <= 0) {
            flash('error', 'id invalido');
            redirect(BASE_URL .'/index.php');
            $stmt = $pdo->prepare('select id, title from posts where id = :id');
            $stmt->execute([':id' => $id]);
            $post = $stmt->fetch();
            if(!$post) {
                flash('error', 'post nao encontrado');
                redirect(BASE_URL .'/index.php');
            };
            render('posts/delete_confirm', compact('post'), 'Delete Post');
        }
    function delete_post(PDO $pdo): void {
        $id = (int)($_GET['id'] ?? 0);
        if($id <= 0) {
            flash('error', 'id invalido');
            redirect(BASE_URL .'/index.php');
            $stmt = $pdo->prepare('delete from posts where id = :id');
            $stmt->execute([':id' => $id]);
            flash('sucesso ne', 'post deletado ne');
            redirect(BASE_URL .'.index.php');
        }
    }
    };
};