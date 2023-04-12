<?php 

    if (isset($_POST['submit'])) {
    session_start();
    require_once('config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$password'";
    $result = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($result)) {
        header('Location: home.php');
        $_SESSION['email'] = $email;
        $_SESSION['logged'] = true;
    } else {
        header('Location: login.php');
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    } 
} 
?>