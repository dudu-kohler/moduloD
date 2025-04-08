<?php

if (isset($_FILES['arquivos'])) {

    $arquivo = $_FILES['arquivos'];
    $names = $arquivo['name'];
    $tmp_name = $arquivo['tmp_name'];

    foreach ($names as $name) {
        $extesion = pathinfo($name, PATHINFO_EXTENSION);
        if ($extesion != 'png' && $extesion != 'jpg'  && $extesion != 'jpeg') {
            die('Coloca uma imagem valida animal!');
        }
    }

    foreach ($names as $index => $name) {
        $extesion = pathinfo($name, PATHINFO_EXTENSION);
        $newName = uniqid() . '.' . $extesion;
        move_uploaded_file($tmp_name[$index], 'uploads/' . $newName);
    }

} else {
?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="arquivos[]" multiple>
        <button type="submit">Enviar</button>
    </form>
<?php } ?>