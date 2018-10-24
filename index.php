<?php
session_start();
include './servicos/variaveisGlobais.php';
include './servicos/Conexao.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Copa Amajal</title>
        <style>
            @import url('css/layout.css');
        </style>
    </head>
    <body >
        <div id="topo">
            <a href="index.php"> Copa Amajal</a>
        </div>
        <div  id="conteudoGeral">
            <?php
            include 'menu.php';
            if (isset($_GET['pagina'])) {

                if ($_GET['pagina'] == 0) {
                    include './conteudo/paginaEmConstrucao.php';
                } elseif ($_GET['pagina'] == 1) {
                    include './conteudo/cadastroJogador.php';
                } else if ($_GET['pagina'] == 2) {
                    include './conteudo/cadastroTime.php';
                } elseif ($_GET['pagina'] == 3) {
                    include './conteudo/criacaoElenco.php';
                } elseif ($_GET['pagina'] == 4) {
                    include './conteudo/cadastroCalendarioJogos.php';
                } elseif ($_GET['pagina'] == 5) {
                    include './conteudo/sumulaDaPartida.php';
                }
                 elseif ($_GET['pagina'] == 6) {
                    include './conteudo/sumularJogadores.php';
                }
                 elseif ($_GET['pagina'] == 7) {
                    include './conteudo/relatorioJogador.php';
                }
                
                 elseif ($_GET['pagina'] == 8) {
                    include './conteudo/resumoConexao.php';
                }
                
                
                
                
            }
            ?>
        </div>
        <script src="js/funcoes.js">

        </script>
    </body>
</html>