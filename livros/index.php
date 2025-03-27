<?php 

$db = new PDO('sqlite:banco.sqlite');

$query = $db->prepare("SELECT * FROM livros");
$query->execute();
$usuarios = $query->fetchAll();

?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>senha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($usuarios as $p): ?>
        <tr>
            <td><?= $p['id_usuario'] ?></td>
            <td><?= $p['nome'] ?></td>
            <td><?= $p['senha'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>