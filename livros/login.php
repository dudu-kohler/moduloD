<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="acoes.php">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>
        
        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <input type="submit" name="login" value="Entrar">
    </form>
    <p>Ainda não tem conta? <a href="cadastrar_usuario.php">Cadastre-se</a></p>
</body>
</html>
