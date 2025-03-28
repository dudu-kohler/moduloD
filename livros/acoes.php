<?php

$db = new PDO('sqlite:banco.sqlite');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cadastrar_usuario'])) {

    if (strlen($_POST['nome']) == 0) {
        header('Location: cadastrar.php');
        $_SESSION['mensagem'] = 'O campo nome é obrigatorio!';
        exit();

    } elseif (strlen($_POST['senha']) == 0) {
        header('Location: cadastrar.php');
        $_SESSION['mensagem'] = 'O campo senha é obrigatorio!';
        exit();
    } else {

        $nome = ($_POST['nome']);
        $senha = ($_POST['senha']);

        $query = $db->prepare("INSERT INTO livros (nome, senha) VALUES (:nome, :senha)");
        $user = $query->execute([
            'nome' => $nome,
            'senha' => $senha
        ]);

        header('Location: cadastrar_livros.php');
    }
}

if (isset($_POST['logar'])) {

    if (strlen($_POST['nome']) == 0) {
        header('Location: login.php');
        exit();
    } elseif (strlen($_POST['senha']) == 0) {
        header('Location: login.php');
        exit();
    } else {

        $query = db()->prepare("SELECT * FROM livros WHERE nome = :nome AND senha = :senha");
        $query->execute([
            'nome' => $_POST['nome'],
            'senha' => $_POST['senha']
        ]);

        if ($user = $query->fetch()) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            header('Location: cadastrar_livros.php');
        }else{
            $_SESSION['mensagem'] = 'nome ou senha invalidos!';
            header('Location: login.php');
        }

    }
}
