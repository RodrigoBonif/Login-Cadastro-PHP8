<?php
$erro = '';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<main>
<body>
        <div class="box">
            <div class="img"></div>
        </div>
        <form action="testLogin.php" method="POST" class="box">
            <h2>Login</h2>
            <span><?=isset($_SESSION['erro']) ? $_SESSION['erro'] : ''?></span>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
            <br><br>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" <?= isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>>
            <br><br>
            <div class="btns">
                <input type="submit" name="submit" id="submit" value="entrar">
                <a href="cadastro.php">Cadastrar</a>
            </div>
        </form>
    </main>
</body>
</html>