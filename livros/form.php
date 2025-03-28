<?php

if (isset($_POST['nome'])) {

    $db = new PDO('sqlite:banco.sqlite');
    $query = $db->prepare("INSERT INTO livros 
    (nome,senha) VALUES (:nome, :senha)");

    $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $query->execute([
        'nome' => $_POST['nome'],
        'senha' => $hash
    ]);

    header('Location: index.php');

} else {
?>
    <form method="POST">
        <label for="">Nome</label>
        <input type="text" name="nome" required><br>
        <label for="">Senha</label>
        <input type="password" name="senha" required><br>
        <button type="submit">Enviar</button>
    </form>

<?php } ?>