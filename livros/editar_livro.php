<link rel="stylesheet" href="style.css">
<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID do livro não informado!";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM livros WHERE id = :id");
$stmt->execute(['id' => $id]);
$livro = $stmt->fetch();

if (!$livro) {
    echo "Livro não encontrado!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Editar Livro</title></head>
<body>
<h1>Editar Livro</h1>

<form action="acoes.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $livro['id'] ?>">
    <label>Título: <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>"></label><br>
    <label>Autor: <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>"></label><br>
    <label>Ano: <input type="number" name="ano" value="<?= $livro['ano'] ?>"></label><br>
    <label>Gênero: <input type="text" name="genero" value="<?= htmlspecialchars($livro['genero']) ?>"></label><br>
    <label>Imagem:
        <input type="file" name="imagem">
        <input type="hidden" name="imagem_atual" value="<?= htmlspecialchars($livro['imagem']) ?>">
    </label><br>
    <?php if (!empty($livro['imagem']) && file_exists($livro['imagem'])): ?>
        <img src="<?= $livro['imagem'] ?>" alt="Imagem atual" style="max-width:150px;"><br>
    <?php endif; ?>
    <input type="submit" name="editar_livro" value="Salvar Alterações">
</form>
<a href="index.php">Voltar</a>
</body>
</html>
