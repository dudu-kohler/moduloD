<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    if (!isset($_SESSION['mensagem_erro'])) {
        $_SESSION['mensagem_erro'] = 'Você não tem permissão para acessar essa página!';
    }
    header('Location: login.php');
    exit();
}
