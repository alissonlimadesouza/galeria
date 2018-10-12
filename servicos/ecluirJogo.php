<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './variaveisGlobais.php';
include './Conexao.php';


echo $idJogo = $_POST['idJogo'];


$excluirJogo = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$excluirJogo->conectar();
$excluirJogo->verificaConexao();

$consulta = "DELETE FROM times_has_torneios WHERE idTimeHasTorneiro='$idJogo'";

$excluirJogo->excluiOcorrencia($consulta);


$consulta = "alter table times_has_torneios auto_increment=1";

$excluirJogo->salvaOcorrencia($consulta);




header('Location: ../index.php?pagina=4');

