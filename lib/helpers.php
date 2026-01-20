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
