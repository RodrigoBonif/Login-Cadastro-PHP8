<?php
    $erro = '';
    if (isset($_POST['submit'])) {
        if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $pos = strpos($email, "'");
            if (!strpos($email, '@')){
                $erro = "Informe um email válido";
                $email = '';
            } elseif ($pos >= 0 && $pos !== false) {
                $erro = "Email não pode conter aspas";
                $email='';
            } else {
            require_once('config.php');
            
            $sql = "SELECT email FROM usuario WHERE email = '$email'";

            $result = mysqli_query($conexao, $sql);
            
            if (mysqli_num_rows($result)) {
                $erro = "Email já está sendo utilizado, informe outro";
            } else {
                $sql = "INSERT INTO usuario(nome,sobrenome,email,senha) VALUES('$name','$surname','$email','$hash')";
                header('location: logout.php');
                $result = mysqli_query($conexao, $sql);
            }

            
            }
        } else {
            $erro = 'Preencha os Campos corretamente';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <div class="box">
            <div class="img"></div>
        </div>
        <form action="cadastro.php" method="POST" class="box">

            <p>Cadastro</p>
            <span><?=$erro?></span>
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="<?=isset($name) ? $name : '' ?>">

            <br>

            <label for="surname">Sobrenome</label>
            <input type="text" name="surname" id="surname" value="<?=isset($surname) ? $surname : ''?>">

            <br>

            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?=isset($email) ? $email : ''?>">

            <br>

            <label for="password">Senha</label>
            <input type="password" name="password" id="password" value="<?=isset($password) ? $password : ''?>">

            <br>
            <div class="btns">
            <input type="submit" name="submit" id="submit" value="Cadastrar">
            <a href="logout.php">Voltar ao login</a>
            </div>
        </form>
    </main>
</body>
</html>