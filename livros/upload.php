<?php
if (isset($_FILES['file'])) {

    $files = $_FILES['file'];
    $names = $files['name'];
    $tmp_name = $files['tmp_name'];

    foreach($names as $index => $name){
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $newName = uniqid().'.'.$extension;
        move_uploaded_file($tmp_name[$index], 'uploads/'.$newName);
    }
} else {
?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" multiple>
        <button type="submit">Enviar</button>
        </form>
<?php } ?>