<?php
    $name = '';
    session_start();
    if ($_SESSION['email']) {
        
    $email = $_SESSION['email'];

    require_once('config.php');
    
    $sql = "SELECT nome, sobrenome from usuario WHERE email = '$email'";

    $result = mysqli_query($conexao, $sql);
    $row = $result->fetch_assoc();
    foreach($row as $item) {
        $name .= "$item ";
    }
    } else {
        header("location: logout.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body onunload="<?= session_destroy(); ?>">
    <nav>
        <h1>Bem vindo, <?= $name ?></h1>
        <a href="logout.php">                
            <button>Sair</button>
        </a>
    </nav>
    <main>
        <section>
            <div>
            Projeto feito com uso do PHP 8, integrado com banco de dados mySql utilizando o phpMyAdmin para um sistema de cadastro e login 100% funcional
            </div>
            <div class="box-img">
                <img src="imgs/img-PHP8-Home.png" alt="">
                <img src="imgs/img-PHPMYADMIN- Home.png" alt="">
            </div>
        </section>
    </main>
    <script>
        function redirect() {
            window.location.href = "http://localhost/PHP%20-Soft%20-%20Cursos/cursoPHP/Login-Cadastro-PHP8/logout.php"
        }
    </script>
</body>
</html>