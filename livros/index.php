<link rel="stylesheet" href="style.css">
<?php
session_start();
include "conexao.php";

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

$pesquisa = $_GET['pesquisa'] ?? '';
$sql = "SELECT * FROM livros";
$params = [];

if (!empty($pesquisa)) {
    $sql .= " WHERE titulo LIKE :pesquisa OR autor LIKE :pesquisa";
    $params[':pesquisa'] = '%' . $pesquisa . '%';
}

$query = $conn->prepare($sql);
$query->execute($params);
$livros = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
    <style>
        img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>

    <form method="GET" action="index.php">
        <input type="text" name="pesquisa" placeholder="Pesquisar por título ou autor" value="<?= htmlspecialchars($pesquisa) ?>">
        <input type="submit" value="Buscar">
    </form>

    <a href="cadastrar_livros.php">Cadastrar Novo Livro</a> |
    <a href="logout.php">Sair</a>
    <hr>

    <?php if (count($livros) > 0): ?>
        <?php foreach ($livros as $livro): ?>
            <div>
                <h3><?= htmlspecialchars($livro['titulo']) ?></h3>
                <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
                <p><strong>Ano:</strong> <?= htmlspecialchars($livro['ano']) ?></p>
                <p><strong>Gênero:</strong> <?= htmlspecialchars($livro['genero']) ?></p>

                <?php if (!empty($livro['imagem']) && file_exists($livro['imagem'])): ?>
                    <img src="<?= htmlspecialchars($livro['imagem']) ?>" alt="Capa do livro">
                <?php else: ?>
                    <p><em>Sem imagem</em></p>
                <?php endif; ?>

                <p>
                    <a href="editar_livro.php?id=<?= $livro['id'] ?>">Editar</a> |
                    <a href="excluir_livro.php?id=<?= $livro['id'] ?>" onclick="return confirm('Deseja mesmo excluir este livro?')">Excluir</a>
                </p>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum livro encontrado.</p>
    <?php endif; ?>
</body>
</html>
