<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './variaveisGlobais.php';
include './Conexao.php';



$excluirJogadorElenco = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$excluirJogadorElenco->conectar();



$id = $_POST['id'];



$consulta = "DELETE FROM times_has_jogadores WHERE idJogador='$id'";

$excluirJogadorElenco->excluiOcorrencia($consulta);


$consulta = "alter table times_has_jogadores auto_increment=1";

$excluirJogadorElenco->salvaOcorrencia($consulta);

header('Location: ../index.php?pagina=3');
