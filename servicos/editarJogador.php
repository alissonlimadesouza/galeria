<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './variaveisGlobais.php';
include './Conexao.php';



$editar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$editar->conectar();
$editar->verificaConexao();

echo $nome = $_POST['nome'];
echo $id = $_POST['id'];
echo $nascimento = $_POST['nascimento'];
echo $rg = $_POST['rg'];
echo '<br /><br /><br />';
echo $excluir = $_POST['excluir'];





if ($excluir == 1) {
    $consulta = "DELETE FROM jogadores WHERE idJogador='$id'";

    $editar->excluiOcorrencia($consulta);
   

     $consulta = "alter table jogadores auto_increment=1";

    $editar->salvaOcorrencia($consulta);

    
    header('Location: ../index.php?pagina=1');
} else {
    $consulta = "UPDATE jogadores SET nomeJogador='$nome',idadeJogador='$nascimento', rgJogador='$rg' WHERE idJogador='$id'";

    $editar->editarOcorrencia($consulta);

    header('Location: ../index.php?pagina=1');
}




