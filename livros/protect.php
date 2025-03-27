<?php

if (!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_usuario'])){

    die('Você não tem permissão para acessar essa pagina! <a href="login.php">Voltar</a>');
    

}


?>