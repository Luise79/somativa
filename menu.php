<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoLivro.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="css/styleMain.css">
    <title>WebBooks</title>
</head>
<body>
    <!-- Conecta o banco de dados em todos os arquivos que contenham o menu, assim como inicia sessao-->
    <?php require 'connectdb.php';?>
    <?php session_start();?>
    <div class="navbar">
        <div class="cabecalho">
            <a href="index.php" target="_self">
                <div class="itemCabecalho">
                    <img src="images/logoLivro.jpg" id="imageLogo" class="itemLogo">
                    <p id="titleLogo" class="itemLogo">WebBooks</p>
                </div>
            </a>
            <div class="itemCabecalho">
                <a href="login.php" id="login" class="itemCabecalhoFim">Login</a>
                <a href="signUp.php" id="signUp" class="itemCabecalhoFim">Sign Up</a>
                <div id="suaConta" class="w3-dropdown-hover">
                    <button id="buttonSuaConta">Sua Conta</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4 dropDownMenu">
                        <a href="suaConta.php" class="w3-bar-item w3-button">Configurações</a>
                        <form href="#" method="post" class="w3-bar-item w3-button">
                            <button class="buttonMenu" type="input" name="logout" value="logout">Logout</button>
                        </form>
                        <form href="" method="post" class="w3-bar-item w3-button">
                            <button class="buttonMenu" type="input" name="deleteAccount" value="delete">Apagar Conta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        // Nao mostrar mais login/signup se o usuario ja estiver conectado
        if (isset($_SESSION['username'])) {
            $usuario = $_SESSION['username'];
            echo "<script>
            document.getElementById('login').style.display = 'none';
            document.getElementById('signUp').style.display = 'none';        
            </script>";
        
            // Se apertar Apagar Conta entao remover do bd
            if (isset($_POST['deleteAccount']) and $_POST['deleteAccount'] == 'delete') {
                $conn = new mysqli($servername, $username, $password,
                    $dbname) or die("Falha de conexão: " . mysqli_connect_error());

                $idUsuario = $conn->query("SELECT id from `usuarios` WHERE `username`='$usuario'");
                $idUsuario = $idUsuario->fetch_assoc()['id'];
                
                $sql = $conn->query("DELETE FROM `recomendados` WHERE `id_usuario`='$idUsuario';") or die("Nao foi possivel deleter o usuario: ". mysqli_error($conn));                
                $sql = $conn->query("DELETE FROM `usuarios` WHERE `username`='$usuario';") or die("Nao foi possivel deleter o usuario: ". mysqli_error($conn));
                $conn->close();
            }
            // Quando apertado nos botoes de logout ou apagar conta limpar a sessao
            if (isset($_POST['logout']) and $_POST['logout'] == 'logout' or isset($_POST['deleteAccount']) and $_POST['deleteAccount'] == 'delete') {
                session_unset();
                header("Location: login.php");
            }
        } else {
            echo "<script>
            document.getElementById('suaConta').style.display = 'none';
            </script>";

        }
    ?>
</body>
</html>
