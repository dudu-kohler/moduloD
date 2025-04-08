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

$query = $conn->prepare("SELECT * FROM livros WHERE id = :id");
$query->execute(['id' => $id]);
$livro = $query->fetch();

if (!$livro) {
    echo "Livro não encontrado!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Livro</title>
</head>
<body>
    <h1>Confirmar Exclusão do Livro</h1>

    <p><strong>Título:</strong> <?= htmlspecialchars($livro['titulo']) ?></p>
    <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
    <p><strong>Ano:</strong> <?= htmlspecialchars($livro['ano']) ?></p>
    <p><strong>Gênero:</strong> <?= htmlspecialchars($livro['genero']) ?></p>

    <?php if (!empty($livro['imagem']) && file_exists($livro['imagem'])): ?>
        <img src="<?= htmlspecialchars($livro['imagem']) ?>" alt="Capa do livro"><br>
    <?php endif; ?>

    <p>Tem certeza que deseja excluir este livro?</p>

    <form method="POST" action="acoes.php">
        <input type="hidden" name="id" value="<?= $livro['id'] ?>">
        <input type="hidden" name="imagem" value="<?= $livro['imagem'] ?>">
        <input type="submit" name="excluir_livro" value="Confirmar Exclusão">
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
