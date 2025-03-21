<?php

include 'protect.php';

if (!isset($_SESSION)) {
    session_start();
}



?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/src/styles.css" rel="stylesheet">
</head>
<body>
<h1> Bem vindo <?= $_SESSION['nome']; ?> </h1>
<a href="logout.php">Deslogar</a>

<button class="bg-red-50" >
    <h5>Delete</h5>
</button>  

</body>
</html>


