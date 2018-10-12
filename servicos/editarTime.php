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

echo $excluir = $_POST['excluir'];





if ($excluir == 1) {
    $consulta = "DELETE FROM times WHERE idTime='$id'";

    $editar->excluiOcorrencia($consulta);
    $tabela = "times";


    $consulta = "alter table times auto_increment=1";

    $editar->salvaOcorrencia($consulta);




     header('Location: ../index.php?pagina=2');
} else {
    $consulta = "UPDATE times SET nometime='$nome' WHERE idTime='$id'";

    $editar->editarOcorrencia($consulta);

    header('Location: ../index.php?pagina=2');
}




