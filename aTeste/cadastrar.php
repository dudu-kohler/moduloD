<?php

if (!isset($_SESSION)) {
    session_start();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body>

    <h1>Cadastrar</h1>
    <?php
    if (isset($_SESSION['mensagem'])) {
        echo '<h1 class="text-red-800 font-bold border-2 border-solid border-red-950 w-100" >' . $_SESSION['mensagem'] . '</h1>';
        unset($_SESSION['mensagem']);
    }

    ?>

    <form action="acoes.php" method="POST">
        <?php  $classe = isset($_SESSION['mensagem']) ? 'border-red-900' : '';
        var_dump($classe); ?>
        <label for="nome">Nome</label>
        <input type="text" name="nome"><br>
        <label for="Senha">Senha</label>
        <input type="password" name="senha"><br>
        <button type="submit" name="cadastrar_usuario">Cadastrar</button>
    </form>
</body>

</html>