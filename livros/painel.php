<?php 

include 'protect.php';

if (!isset($_SESSION)) {
    session_start();
}

?>

<div>
    <nav>
        <ul>
            <li><a href="painel.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</div>


<h1> Seja bem vindo <?= $_SESSION['nome'] ?> </h1>