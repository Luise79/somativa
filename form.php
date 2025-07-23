<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoLivro.jpg" type="image/jpg">
    <title>WebBooks</title>
</head>
<body>
    <?php require 'menu.php';?>

    <section id="formTabRecomendados" class="formTab">
        <header>
            <span id="formRecomendadosX" class="closetab">X</span>
        </header>
        <div class="groupFormLogin">
            <p class="formTitle">Descubra seus recomendados</p>
            <form id="formRecomendados" action="" target="_self" method="post" onsubmit="return validateForm()">
                <div class="questions" id="q1">
                    <p class="titleQuestion">Quais seus gêneros favoritos?</p>
                    <label class="containerCheckbox" aria-checked="false">Romance
                        <input type="checkbox" name="generoRom" value="romance" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="containerCheckbox" aria-checked="false">Terror
                        <input type="checkbox" name="generoTerror" value="terror" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="containerCheckbox">Ação
                        <input type="checkbox" name="generoAcao" value="acao" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="containerCheckbox">Ficção Filosófica
                        <input type="checkbox" name="generoFilo" value="filosofia" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="questions" id="q2">
                    <p class="titleQuestion">Como prefere o status do livro?</p>
                    <label name="estado" value="ongoing" class="containerCheckbox" aria-checked="false">Em andamento
                        <input type="checkbox" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                    <label name="estado" value="finished" class="containerCheckbox">Concluído
                        <input type="checkbox" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="questions" id="q3">
                    <p class="titleQuestion">Como prefere a extensão do livro?</p>
                    <label name="tamanho" value="short" class="containerCheckbox">Poucos volumes
                        <input type="checkbox" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                    <label name="tamanho" value="long" class="containerCheckbox">Vários volumes
                        <input type="checkbox" class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                    <label name="tamanho" value="new" class="containerCheckbox" aria-checked="false">Lançamentos
                        <input type="checkbox"   class="hideCheckbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <input class="buttonForm" id="buttonRecomendados" type="submit" value="Ver resultado">
            </form> 
        </div>
    </section>

    <?php
        $conn = new mysqli($servername, $username, $password,
            $dbname) or die("Falha de conexão: " . mysqli_connect_error());
        $usuario = $_SESSION['username'];
        $idUsuario = $conn->query("SELECT id FROM usuarios WHERE username='$usuario';");
        $idUsuario = $idUsuario->fetch_assoc()['id'];
        $insertedBooks = false;

        // Caso o usuario tenha apertado botao novo/apagar recomendados na pagina principal
        if (isset($_POST['novosRecomendados'])) {
            deleteRecomendados($conn, $idUsuario);
        }
        if (isset($_POST['apagarRecomendados'])) {
            deleteRecomendados($conn, $idUsuario);
            $conn->close();
            echo "<script>location.href='index.php';</script>";
        }

        // Inserir o genero escolhido pelo usuario no bd
        if (isset($_POST['generoRom']) and $_POST['generoRom'] == 'romance') {
            $insertedBooks = inserirLivrosRecomendados("romance", $conn, $idUsuario);
        } 
        if (isset($_POST['generoTerror']) and $_POST['generoTerror'] == 'terror') {
            $insertedBooks = inserirLivrosRecomendados("terror", $conn, $idUsuario);
        }
        if (isset($_POST['generoAcao']) and $_POST['generoAcao'] == 'acao') {
            $insertedBooks = inserirLivrosRecomendados("acao", $conn, $idUsuario);
        } 
        if (isset($_POST['generoFilo']) and $_POST['generoFilo'] == 'filosofia') {
            $insertedBooks = inserirLivrosRecomendados("filosofia", $conn, $idUsuario);
        }
        // Voltar pra pagina inicial quando os livros forem selecinados/inseridos no bd 
        if ($insertedBooks) {
            $conn->close();
            echo "<script>location.href='index.php';</script>";
        }

        
        // Deleta todos os livros recomendados da db
        function deleteRecomendados($conn, $idUsuario) {
            require 'connectdb.php';
            $sql = $conn->query("DELETE FROM recomendados WHERE id_usuario='$idUsuario';");
            unset($_POST);
        }

        // Insere os livros escolhidos no bd
        function inserirLivrosRecomendados($genero, $conn, $idUsuario) {
            require 'connectdb.php';

            $idLivros = $conn->query("SELECT id FROM livros WHERE genero='$genero';");

            if ($idLivros->num_rows > 0) {

                // Enquanto tiver livros com o genero escolhido envie para tabela recomendados
                while($livro = $idLivros->fetch_assoc()) {
                    $livro = $livro['id'];
                    $sql = $conn->query("INSERT INTO recomendados (id_usuario, cod_livro) VALUES ('$idUsuario', '$livro');");
                }
            }   
            return true;
        }
    ?>

<script src="scripts/scriptForm.js"></script>
</body>
</html>