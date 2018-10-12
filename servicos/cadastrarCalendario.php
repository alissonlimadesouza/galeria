<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './variaveisGlobais.php';
include './Conexao.php';



$calendario = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$calendario->conectar();
$calendario->verificaConexao();



echo "<br />" . $data = $_POST['data'];
echo "<br />" . $timeA = $_POST['timeA'];
echo "<br />" . $timeB = $_POST['timeB'];
echo "<br />" . $nomeTorneio = $_POST['torneio'];
echo "<br />" . $hora = $_POST['hora'];
echo "<br />" . $data = $_POST['data'];










$consultaA = "SELECT * from times_has_torneios t_h_t
INNER JOIN torneiros t 
ON
t_h_t.idTorneiro=t.idTorneiro
INNER JOIN times ti 
ON
ti.idTime=T_h_t.idTime
WHERE
t_h_t.dataJogo='$data'
and
t_h_t.horaJogo='$hora'
and
t_h_t.idTime='$timeA';";

$consultaB = "SELECT * from times_has_torneios t_h_t
INNER JOIN torneiros t 
ON
t_h_t.idTorneiro=t.idTorneiro
INNER JOIN times ti 
ON
ti.idTime=T_h_t.idTime
WHERE
t_h_t.dataJogo='$data'
and
t_h_t.horaJogo='$hora'
and
t_h_t.idTimeB='$timeB';";




$contagemA = $calendario->contaOcorrencias($consultaA);
$contagemB = $calendario->contaOcorrencias($consultaB);


echo "Contagm do jogo" . $contagemA . "<br />";



if ($contagemA > 0 or $contagemB > 0) {


    header("Location: ../index.php?pagina=4&mensagem=1");
} else {
    $consultaA = "INSERT INTO times_has_torneios VALUES ('','$timeA','$timeB','$nomeTorneio','$data','$hora','0','0000-00-00','00:00:00')";

    $calendario->salvaOcorrencia($consultaA);

    header("Location: ../index.php?pagina=4&mensagem=2");
}


















