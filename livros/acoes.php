<?php

include('bd.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cadastrar_livro'])) {

    if (strlen($_POST['titulo']) == 0) {
        header('Location: cadastrar.php');
        $_SESSION['mensagem'] = 'O titulo é obrigatorio!';
        exit();
    } elseif (strlen($_POST['autor']) == 0) {
        header('Location: cadastrar.php');
        $_SESSION['mensagem'] = 'O autor é obrigatorio!';
        exit();
    } elseif (strlen($_POST['descricao']) == 0) {
        header('Location: cadastrar.php');
        $_SESSION['mensagem'] = 'A descricao é obrigatorio!';
        exit();
    } else {

        $nome = ($_POST['titulo']);
        $email = ($_POST['autor']);
        $senha = ($_POST['descricao']);

        $query = db()->prepare("INSERT INTO usuarios (titulo,autor,descricao) VALUES (:titulo, :autor, :descricao)");
        $user = $query->execute([
            'nome' => $nome,
            'email' => $email,
            'senha' => $senha
        ]);

        header('Location: index.php');
    }
}

if (isset($_POST['logar'])) {

    if (strlen($_POST['email']) == 0) {
        header('Location: login.php');
        exit();
    } elseif (strlen($_POST['senha']) == 0) {
        header('Location: login.php');
        exit();
    } else {

        $query = db()->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $query->execute([
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ]);

        if ($user = $query->fetch()) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];
            header('Location: painel.php');
        }else{
            $_SESSION['mensagem'] = 'Email ou senha invalidos!';
            header('Location: login.php');
        }




    }
}
