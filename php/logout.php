<?php
// Inicia a sessão se ela não estiver iniciada
session_start();

// Destroi todas as variáveis de sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();
?>