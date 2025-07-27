<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoLivro.jpg" type="image/jpg">    
    <title>Login</title>
</head>
<body>
    <?php require 'menu.php';?>

    <div id="loginTab" class="formTab">
        <header>
            <span id="loginX" class="closetab">X</span>
        </header>
        <div class="groupFormLogin">
            <p class="formTitle">Login</p>
            <form action="#" method="post">
                <label>Username</label><br>
                <input type="text" class="inputText" name="username" placeholder="Username" autofocus="true" required><br>
                <label id="labelPassword">Password</label><br>
                <input type="password" class="inputText" name="password" placeholder="Password" required><br>
                <button class="buttonForm" id="buttonLogin" type="input">Logar</button>
                <p id="errorMsg" style="display: none;"></p>
                <div>Nao tem uma conta? <a href="signUp.php">Cadastre-se</a></div>
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['username']) and isset($_POST['password'])) {
            require 'connectdb.php';
            $conn = new mysqli($servername, $username, $password,$dbname) or die("Falha de conexão: " . mysqli_connect_error());
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = $conn->query("SELECT `username`, `senha` from `usuarios` WHERE `username` = '$username' and `senha` = '$password'");

            if ($sql->num_rows > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $url = 'home.php';
                header("location:".$url);
            } else {
                echo "<script>
                    let element = document.getElementById('errorMsg');
                    element.style.display = 'block';
                    element.innerHTML = 'Usuario ou senha inválidos!';
                    </script>";
            }
            $conn->close();
        }
    ?>

    <script src="scripts/scriptForm.js"></script>
</body>
</html>