<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include './variaveisGlobais.php';
include './Conexao.php';



$elencar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$elencar->conectar();





/*
 * a ariável $contagem que recebe a quantidade de jogadores para elencar o time
 * 
 */
$contagem = $_SESSION['contadorJogadores'];

/*
 * 
 * 
 */


/*
 * Variável $idJogador recebe por meio de sessão os codigos dos jogadores para
 * lançar na tabela que relaciona jogador mo o time
 * 
 * 
 */
$idJogador = $_SESSION['codigoJogador'];




/*
 * 
 * 
 */


$time = $_POST['time'];




//echo "Codigo do time : " . $time . "<br />";








for ($i = 0; $i <= $contagem; $i++) {
     echo 'Cógido do jogador ->' . $idJogador[$i] . " Valor do jogador ->" . $_POST[$idJogador[$i]] . " <br />";



    if ($_POST[$idJogador[$i]] == 1) {



        $consulta = "INSERT INTO times_has_jogadores VALUES ('','$time','$idJogador[$i]');";
        $elencar->salvaOcorrencia($consulta);
    } elseif ($_POST[$idJogador[$i]] == 0) {
        
    }
}


header("Location: ../index.php?pagina=3");
