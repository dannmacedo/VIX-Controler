<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo json_encode(['authenticated' => false]);
} else {
    echo json_encode(['authenticated' => true]);
}
?>