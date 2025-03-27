<?php

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['id'])){
    header('Location: painel.php');
}

?>

<?php
if (isset($_SESSION['mensagem'])) {
    echo '<h4>' . $_SESSION['mensagem'] . '</h4>';
    unset($_SESSION['mensagem']);
}
?>
<form action="acoes.php" method="POST">
    <label for="">Nome</label>
    <input type="text" name="nome"><br>
    <label for="">Senha</label>
    <input type="password" name="senha"><br>
    <button type="submit" name="logar">Logar</button>
</form>