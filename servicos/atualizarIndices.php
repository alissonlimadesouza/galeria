<?php



$indice = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$indice->conectar();
$indice->verificaConexao();




$consulta = "alter table '$tabela' auto_increment=1";

$indice->salvaOcorrencia($consulta);
?>        