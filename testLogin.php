<?php 

    if (isset($_POST['submit'])) {
    session_start();
    require_once('config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$password'";
    $result = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($result)) {
        header('Location: index.php');
        $_SESSION['email'] = $email;
        $_SESSION['logged'] = true;
    } else {
        $_SESSION['erro'] = 'Usuário e/ou senhas incorretos!';
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('Location: login.php');
    } 
} 
?>