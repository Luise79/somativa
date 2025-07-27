<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoLivro.jpg" type="image/jpg">  
    <title>Sign Up</title>
</head>
<body>
    <?php require 'menu.php';?>
    <?php require 'connectdb.php';?>

    <div id="loginTab" class="formTab">
        <header>
            <span id="loginX" class="closetab">X</span>
        </header>
        <div class="groupFormLogin">
            <p class="formTitle">Sign Up</p>
            <form action="#" method="post">
                <div id="divEmail">
                    <label>Email</label><br>
                    <input type="text" class="inputText" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="exemplo@email.com" required autofocus="true"><br>
                </div>
                <div id="divUsername">
                    <label>Username</label><br>
                    <input type="text" class="inputText" id="username" name="username" placeholder="Username" pattern="[A-Za-z]{3,}" title="Deve conter apenas letras" maxlength="20" required><br>
                </div>
                <div id="divPassword">
                    <label>Senha</label><br>
                    <input type="password" class="inputText" id="password" name="password" placeholder="Password" maxlength="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Deve conter no mínimo 6 digitos com pelo menos uma letra maiuscula, uma minuscula e um numero" required><br>
                </div>
                <p>É maior de idade?</p>
                <div>
                    <input type="radio" name="maiorIdade" id="maiorIdadeTrue" value="1" required> 
                    <label for="maiorIdadeTrue">Sim</label>
                    <br>
                    <input type="radio" name="maiorIdade" id="maiorIdadeFalse" value="0"> 
                    <label for="maiorIdadeFalse">Não</label>
                </div>
                <button class="buttonForm" id="buttonLogin" type="input">Logar</button>
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password']) and isset($_POST['maiorIdade'])) {
            $conn = new mysqli($servername, $username, $password,
                $dbname) or die("Falha de conexão: " . mysqli_connect_error());

            $email = $_POST['email']; $username = $_POST['username']; 
            $password = md5($_POST['password']); $maiorIdade = $_POST['maiorIdade'];

            // verificar se usuario/email ja existem no db
            $sql = $conn->query("SELECT * FROM `usuarios` WHERE `email` = '$email' or `username` = '$username'");
            if ($sql->num_rows > 0) {
                // mostra se é o email que ja foi cadastrado
                $sql = $conn->query("SELECT * FROM `usuarios` WHERE `email` = '$email'");
                if ($sql->num_rows > 0) {
                    echo "<script>
                        let element = document.createElement('p');
                        element.innerHTML = 'Este email já foi cadastrado!';
                        document.getElementById('divEmail').appendChild(element);
                    </script>";
                }
                // mostra se o usuario já foi cadastrado
                $sql = $conn->query("SELECT * FROM `usuarios` WHERE `username` = '$username'");
                if ($sql->num_rows > 0) {
                    echo "<script>
                        let element = document.createElement('p');
                        element.innerHTML = 'Usuario já cadastrado!';
                        document.getElementById('divUsername').appendChild(element);
                    </script>";
                }
                $conn->close();
            } else {
                // Envia os dados pro banco e fecha a conexao
                $sql = $conn->query("INSERT INTO `usuarios`(`username`, `email`, `senha`, `maiorIdade`) VALUES('$username', '$email', '$password', '$maiorIdade')");
                $conn->close();

                // Salva os dados do usuario numa sessao
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                // Redireciona para pagina principal
                $url = 'home.php';
                echo "<script>location.href='home.php';</script>";
            }
        }
    ?>

    <script src="scripts/scriptForm.js"></script>
</body>
</html>