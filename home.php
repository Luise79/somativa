<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoLivro.jpg" type="image/jpg">  
    <title>WebBooks</title>
</head>
<body>
    <?php require 'menu.php';
    require 'index.html'?>
    <?php
        // testing connection 2.0
        if (!isset($_SESSION['username'])) {
            header('Location: login.php');
        }
    ?>

    <section id="main" class="formTab">
        <div class="container">
            <div class="containerLivros">
                <p class="titleGenero">Recomendados</p>
                <div class="livros" id="recomendados">
                    <a id="changePage" href="form.php">
                        <span class="buttonForm" id="buttonRecomendados" onclick="insertLivrosRecomendados()">Descubra seus recomendados</span>
                    </a>
                </div>
                <div class="buttonsUpdate">
                    <form action="form.php" method="post">
                        <button type="submit" id="novosRecomendados" class="buttonUpdateRec" name="novosRecomendados" value="novos" onclick="deleteLivrosRecomendados()">Novos recomendados</button>
                    </form>
                    <form action="form.php" method="post">
                        <button type="submit" id="apagarRecomendados" class="buttonUpdateRec" name="apagarRecomendados" value="deletado" onclick="deleteLivrosRecomendados()">Apagar recomendados</button>
                    </form>
                </div>
            </div>
            <div class="containerLivros">
                <p class="titleGenero">Romance</p>
                <div class="livros" id="romance">
                    <div id="livroRomance1" class="livro card romance finished long">
                        <div class="fotoCapa">
                            <img src="images/livroRomance.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance1" class="livro card romance finished long">
                        <div class="fotoCapa">
                            <img src="images/livroRomance.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance1" class="livro card romance finished long">
                        <div class="fotoCapa">
                            <img src="images/livroRomance.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance1" class="livro card romance finished long">
                        <div class="fotoCapa">
                            <img src="images/livroRomance.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance1" class="livro card romance finished long">
                        <div class="fotoCapa">
                            <img src="images/livroRomance.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance1" class="livro card romance finished long">
                        <div class="fotoCapa">
                            <img src="images/livroRomance.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance2" class="livro card romance ongoing new">
                        <div class="fotoCapa">
                            <img src="images/livroRomance2.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance2" class="livro card romance ongoing new">
                        <div class="fotoCapa">
                            <img src="images/livroRomance2.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroRomance2" class="livro card romance ongoing new">
                        <div class="fotoCapa">
                            <img src="images/livroRomance2.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containerLivros" id="terror">
                <p class="titleGenero">Terror</p>
                <div class="livros" id="terror">
                    <div id="livroTerror1" class="livro card terror finished short">
                        <div class="fotoCapa">
                            <img src="images/livroTerror.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroTerror1" class="livro card terror finished short">
                        <div class="fotoCapa">
                            <img src="images/livroTerror.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroTerror1" class="livro card terror finished short">
                        <div class="fotoCapa">
                            <img src="images/livroTerror.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroTerror1" class="livro card terror finished short">
                        <div class="fotoCapa">
                            <img src="images/livroTerror.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroTerror1" class="livro card terror finished short">
                        <div class="fotoCapa">
                            <img src="images/livroTerror.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containerLivros" id="acao">
                <p class="titleGenero">Ação</p>
                <div class="livros" id="terror">
                    <div id="livroAcao1" class="livro card acao ongoing long">
                        <div class="fotoCapa">
                            <img src="images/livroAcao.png" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroAcao1" class="livro card acao ongoing long">
                        <div class="fotoCapa">
                            <img src="images/livroAcao.png" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroAcao1" class="livro card acao ongoing long">
                        <div class="fotoCapa">
                            <img src="images/livroAcao.png" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroAcao1" class="livro card acao ongoing long">
                        <div class="fotoCapa">
                            <img src="images/livroAcao.png" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroAcao1" class="livro card acao ongoing long">
                        <div class="fotoCapa">
                            <img src="images/livroAcao.png" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroAcao1" class="livro card acao ongoing long">
                        <div class="fotoCapa">
                            <img src="images/livroAcao.png" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroAcao1" class="livro card acao ongoing long">
                        <div class="fotoCapa">
                            <img src="images/livroAcao.png" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containerLivros" id="filosofia">
                <p class="titleGenero">Ficção Filosófica</p>
                <div class="livros" id="terror">
                    <div id="livroFilosofia1" class="livro card filosofia finished short">
                        <div class="fotoCapa">
                            <img src="images/livroFiccaoFilosofica.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroFilosofia1" class="livro card filosofia finished short">
                        <div class="fotoCapa">
                            <img src="images/livroFiccaoFilosofica.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroFilosofia1" class="livro card filosofia finished short">
                        <div class="fotoCapa">
                            <img src="images/livroFiccaoFilosofica.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                    <div id="livroFilosofia1" class="livro card filosofia finished short">
                        <div class="fotoCapa">
                            <img src="images/livroFiccaoFilosofica.jpg" class="imageCapaLivro">
                        </div>
                        <div class="textLivro">
                            <h6 class="titleLivro">Lore Olympus</h6>
                            <p class="descricaoLivro">descricao sobre o livro extensa pra testar se sobresai na pagina</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php    
        // pegar div recomendados, select all# $idlivros, append
        $usuario = $_SESSION['username'];

        require 'connectdb.php';
        $conn = new mysqli($servername, $username, $password,
            $dbname) or die("Falha de conexão: " . mysqli_connect_error());
        $idUsuario = $conn->query("SELECT id FROM usuarios WHERE username='$usuario';");
        $idUsuario = $idUsuario->fetch_assoc()['id'];
        $idLivros = $conn->query("SELECT cod_livro FROM recomendados WHERE id_usuario='$idUsuario';");

        // Pegar os livros recomendados do bd do usuario caso ja tenho feito a pesquisa
        if ($idLivros->num_rows > 0) {
            // Mostrar todos os generos selecionados pelo usuario 
            while ($idLivro = $idLivros->fetch_assoc()) {
                $idLivro = $idLivro['cod_livro'];
                echo "<script>
                    for (let livro of document.querySelectorAll('#$idLivro')) {
                        livro = livro.cloneNode(true);
                        document.getElementById('recomendados').appendChild(livro);
                    }
                </script>";

            }
        }
        $conn->close();
    ?>

    <script src="scripts/scriptIndex.js"></script>

</body>
</html>