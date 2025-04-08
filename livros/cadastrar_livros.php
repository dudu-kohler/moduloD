<link rel="stylesheet" href="style.css">
<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Cadastrar Livro</title></head>
<body>
<h1>Cadastrar Livro</h1>

<form action="acoes.php" method="POST" enctype="multipart/form-data">
    <label>Título: <input type="text" name="titulo" required></label><br>
    <label>Autor: <input type="text" name="autor" required></label><br>
    <label>Ano: <input type="number" name="ano" required></label><br>
    <label>Gênero: <input type="text" name="genero"></label><br>
    <label>Imagem: <input type="file" name="imagem"></label><br>
    <input type="submit" name="cadastrar_livro" value="Cadastrar">
</form>
<a href="index.php">Voltar</a>
</body>
</html>
