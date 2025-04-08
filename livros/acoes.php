
<?php
session_start();
include 'conexao.php';

// LOGIN
if (isset($_POST['login'])) {
    $nome = $_POST['nome'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome = :nome");
    $stmt->execute([':nome' => $nome]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: index.php');
        exit();
    } else {
        echo "Usuário ou senha incorretos.";
        exit();
    }
}

// CADASTRO DE USUÁRIO
if (isset($_POST['cadastrar_usuario'])) {
    $nome = $_POST['nome'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($nome) && !empty($senha)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)");
        try {
            $stmt->execute([':nome' => $nome, ':senha' => $senhaHash]);
            header('Location: login.php');
            exit();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar usuário: " . $e->getMessage();
            exit();
        }
    } else {
        echo "Preencha todos os campos.";
        exit();
    }
}

// CADASTRAR LIVRO
if (isset($_POST['cadastrar_livro'])) {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $ano = $_POST['ano'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $imagem = '';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $caminhoImagem = 'uploads/' . uniqid() . '.' . $extensao;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem);
        $imagem = $caminhoImagem;
    }

    $stmt = $conn->prepare("INSERT INTO livros (titulo, autor, ano, genero, imagem) VALUES (:titulo, :autor, :ano, :genero, :imagem)");
    $stmt->execute([
        ':titulo' => $titulo,
        ':autor' => $autor,
        ':ano' => $ano,
        ':genero' => $genero,
        ':imagem' => $imagem
    ]);

    header('Location: index.php');
    exit();
}

// EDITAR LIVRO
if (isset($_POST['editar_livro'])) {
    $id = $_POST['id'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $ano = $_POST['ano'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $imagemAntiga = $_POST['imagem_antiga'] ?? '';
    $imagem = $imagemAntiga;

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        if (!empty($imagemAntiga) && file_exists($imagemAntiga)) {
            unlink($imagemAntiga);
        }
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $caminhoImagem = 'uploads/' . uniqid() . '.' . $extensao;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem);
        $imagem = $caminhoImagem;
    }

    $stmt = $conn->prepare("UPDATE livros SET titulo = :titulo, autor = :autor, ano = :ano, genero = :genero, imagem = :imagem WHERE id = :id");
    $stmt->execute([
        ':titulo' => $titulo,
        ':autor' => $autor,
        ':ano' => $ano,
        ':genero' => $genero,
        ':imagem' => $imagem,
        ':id' => $id
    ]);

    header('Location: index.php');
    exit();
}

// EXCLUIR LIVRO
if (isset($_POST['excluir_livro'])) {
    $id = $_POST['id'] ?? null;
    $imagem = $_POST['imagem'] ?? null;

    if ($id) {
        if (!empty($imagem) && file_exists($imagem)) {
            unlink($imagem);
        }

        $stmt = $conn->prepare("DELETE FROM livros WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    header('Location: index.php');
    exit();
}
?>
