<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




include './variaveisGlobais.php';
include './Conexao.php';

$idJogo = $_POST['idJogo'];
date_default_timezone_set('America/Sao_Paulo');


$dataAtual = date("Y-m-d");
$horaAtual = date("H:i:s");

$excluirSumula = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$excluirSumula->conectar();
$consulta = "DELETE FROM time_has_torneio_has_gols WHERE idTimeHasTorneio='$idJogo'";
$excluirSumula->excluiOcorrencia($consulta);
$consulta = "DELETE FROM time_has_torneio_has_cartoes WHERE idTimeHasTorneio='$idJogo'";
$excluirSumula->excluiOcorrencia($consulta);
$consulta = "UPDATE times_has_torneios SET statusLancamento='0', dataLancamento='$dataAtual', horaLancamento='$horaAtual' WHERE idTimeHasTorneiro='$idJogo'";
$excluirSumula->editarOcorrencia($consulta);

$consulta = "alter table  time_has_torneio_has_cartoes auto_increment=1";

$excluirSumula->salvaOcorrencia($consulta);


$consulta = "alter table time_has_torneio_has_gols auto_increment=1";

$excluirSumula->salvaOcorrencia($consulta);

header("refresh:1; url=../index.php?pagina=5");

//header("Location: ../index.php?pagina=5");

