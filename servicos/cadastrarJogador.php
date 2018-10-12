<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './variaveisGlobais.php';
include './Conexao.php';



$cadastro = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$cadastro->conectar();
$cadastro->verificaConexao();

$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$rg = $_POST['rg'];


/*
 * Verifica se o cpf já existe. se o cpf já existir
 * não realiza o cadastro
 * 
 */
$consulta = "Select * from jogadores where rgJogador='$rg'";
$contagem = $cadastro->contaOcorrencias($consulta);
if ($contagem > 0) {
    header('Location: ../index.php?pagina=1&mensagem=3');
} else {
    $consulta = "insert into jogadores values ('','$nome','$nascimento','$rg','','','')";
    $cadastro->salvaOcorrencia($consulta);
    $consulta = "Select * from jogadores where rgJogador='$rg'";
    $contagem = $cadastro->contaOcorrencias($consulta);
    if ($contagem > 0) {
        header('Location: ../index.php?pagina=1&mensagem=1');
    } else {
        header('Location: ../index.php?pagina=1&mensagem=2');
    }
}

















