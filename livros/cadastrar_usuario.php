<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form method="POST" action="acoes.php">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <input type="submit" name="cadastrar_usuario" value="Cadastrar">
    </form>
    <p>Já tem conta? <a href="login.php">Faça login</a></p>
</body>
</html>
