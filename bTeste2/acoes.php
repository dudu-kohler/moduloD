<?
if (isset($_POST['cadastrar_usuario'])) {

if (strlen($_POST['nomeL']) == 0) {
    header('Location: cadastrar.php');
    $_SESSION['mensagem'] = 'O campo de nome é obrigatorio!';
    exit();
} else {

    $nome = ($_POST['nomeL']);

    $query = db()->prepare("INSERT INTO usuarios (nome) VALUES (:nome)");
    $user = $query->execute([
        'nomeL' => $nome
    ]);

    
    
    }
}