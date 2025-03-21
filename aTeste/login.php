<?php

if (!isset($_SESSION)) {
    session_start();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>

<h1>Login</h1>

<?php 
    if(isset($_SESSION['mensagem'])){
        echo '<h1 class="font-bold" >' . $_SESSION['mensagem'] . '</h1>';
        unset($_SESSION['mensagem']);
    }

?>

<form action="acoes.php" method="POST">
    <label for="nome">Email</label>
    <input type="email" name="email">
    <label for="nome">Senha</label>
    <input type="password" name="senha">
    <button class="border-2 border-solid" type="submit" name="logar">Entrar</button>
</form>

<a href="cadastrar.php">Cadastrar</a>

    
</body>
</html>