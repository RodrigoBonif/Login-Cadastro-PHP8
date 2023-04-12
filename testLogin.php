<?php 

    if (isset($_POST['submit'])) {
    session_start();
    require_once('config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conexao, $sql);
    
    $usuario = $result->fetch_assoc();
    $hash = $usuario['senha'];
    print_r($hash);

    if (password_verify($password, $usuario['senha'])) {
        echo "Funcionou";
        header('Location: index.php');
        $_SESSION['email'] = $email;
        $_SESSION['logged'] = true;
    } else {
        echo "Não funcionou";
        $_SESSION['erro'] = 'Usuário e/ou senhas incorretos!';
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('Location: login.php');
    }
} 
?>