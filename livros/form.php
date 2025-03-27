<?php

if (isset($_POST['nome'])) {

    $db = new PDO('sqlite:banco.sqlite');
    $query = $db->prepare("INSERT INTO usuarios 
    (nome, email, senha) VALUES (:nome, :email, :senha)");

    $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $query->execute([
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => $hash
    ]);

    header('Location: index.php');

} else {
?>
    <form method="POST">
        <label for="">Nome</label>
        <input type="text" name="nome" required><br>
        <label for="">Email</label>
        <input type="email" name="email" required><br>
        <label for="">Senha</label>
        <input type="password" name="senha" required><br>
        <button type="submit">Enviar</button>
    </form>

<?php } ?>