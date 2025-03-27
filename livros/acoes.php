<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['logar'])){

    $db = new PDO('sqlite:banco.sqlite');
    $query = $db->prepare("SELECT * FROM livros
    WHERE nome = :nome");

    $query->execute([
        'nome' => $_POST['nome']
    ]);

    $user = $query->fetch();

    if(password_verify($_POST['senha'], $user['senha'])){

        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        header('Location: painel.php');

    }else{
        $_SESSION['mensagem'] = 'Email ou senha invalidos!';
        header('Location: login.php');
    }
}