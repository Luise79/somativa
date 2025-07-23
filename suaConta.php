<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <link rel="icon" href="images/logoLivro.jpg" type="image/jpg">  
    <title>WebBooks</title>
</head>
<body>
    <?php require 'menu.php';?>

    <div id="loginTab" class="formTab">
        <header>
            <span id="loginX" class="closetab">X</span>
        </header>
        <div class="groupFormLogin">
            <p class="formTitle">Configurações da conta</p>
            <form action="#" method="post">
                <label>Atualizar o nome do usuário:</label>
                <input type="text" class="inputText" name="username" placeholder="Username" pattern="[A-Za-z]{3,}" title="Deve conter apenas letras" maxlength="20"><br>
                <label id="labelPassword">Atualizar senha do usuário:</label>
                <input type="password" class="inputText" name="password" placeholder="Nova Senha" maxlength="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Deve conter no mínimo 6 digitos com pelo menos uma letra maiuscula, uma minuscula e um numero"><br>
                <p id="errorMsg" style="display: none;"></p>
                <button class="buttonForm" id="salvarConfig" type="input">Salvar</button>
            </form>
        </div>
    </div>

    <script src="scripts/scriptForm.js"></script>

    <?php
        if (isset($_SESSION['username'])) {
            $conn = new mysqli($servername, $username, $password,$dbname) or die("Falha de conexão: " . mysqli_connect_error());
            $usuario = $_SESSION['username'];

            if (isset($_POST['username']) and $_POST['username'] != "") {
                $newUsername = $_POST['username'];

                // Verificar se ja existe usuario com esse nome
                $sql = $conn->query("SELECT username FROM usuarios WHERE username='$newUsername';");
                if ($sql->num_rows > 0) {
                    echo "<script>
                        let element = document.getElementById('errorMsg');
                        element.style.display = 'block';
                        element.innerHTML = 'Nome de usuario já cadastrado!';
                        </script>";
                    return;
                } 
                
                $sql = $conn->query("UPDATE `usuarios` SET `username`='$newUsername' WHERE `username`='$usuario'");
                $_SESSION['username'] = $newUsername;
                $usuario = $newUsername;

                echo "<script>alert('Bem vindo, $newUsername!')</script>";
            }
            if (isset($_POST['password']) and $_POST['password'] != "") {
                $newPassword = md5($_POST['password']);
                $_SESSION['password'] = $newPassword;
                $sql = $conn->query("UPDATE `usuarios` SET `senha`='$newPassword' WHERE `username`='$usuario'") or die('nao deu'.mysqli_error($conn));
                echo "<script>alert('Sua senha foi alterada com sucesso!')</script>";
            }
            
            $conn->close();
        } else {
            header('Location: login.php');
        }
    ?>

</body>
</html>