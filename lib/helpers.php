<?php
session_start();

//previne xss
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    
}

//redirect helper
function redirect(string $path): void {
    header ("Location".$path);
    exit;
};

// cria ou procura um csrf token guardado na sessao
function csrf_token(): string {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

// valida um csrf token q esta chegando na requisicao post
function require_csrf(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf'] ?? '';
        if(!$token || !hash_equals($_SESSION['csrf'] ?? '', $token)) {
            http_response_code(400);
            echo "Invalid CSRF token";
            exit;
        }
    }
}

// flash msg = grava a msg 1 vez na sessao

function flash(string $key, ?string $message = null): ?string {
    if($message !== null) {
        $_SESSION['flash'][$key] = $message;
        return null;
    }
    $val = $_SESSION['flash'][$key] ?? null;
    if($val !== null) {
        unset($_SESSION['flash'][$key]);
    }
    return $val;
}

// pequena validacao para os campos requireds com maximo tamanho
function validate_post (array $data, array $rules): array {
    $errors = [];
    foreach ($rules as $field => $opts) {
        $label = $opts['label'] ?? ucfirst($field);
        $val = trim($data[$field] ?? '');
        if(!empty($opts['required'] && $val === '')) {
            $errors[$field] = "$label is required.";
            continue;
        }
        if (isset($opts['max']) && mb_strlen($val) > $opts['max']) {
            $errors[$field] = "$label must be at most {$opts['max']} characters.";
        }
    }
}

return $errors;