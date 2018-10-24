<?php

/*
 * Programação verifica a quantidade de cartões amarelos
 * e se for de tres para cima contabiliza na 
 * tabela do jogador e apaga no histórico.
 * 
 * 
 */
include './variaveisGlobais.php';
include './Conexao.php';

$idTimeA = $_POST['idTimeA'];
$idTimeB = $_POST['idTimeB'];

function contabilizarAmarelos($idTime) {
    include './variaveisGlobais.php';
    $contabilizarAmarelo = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
    $consulta = "select * from jogadores";
    $contagem = $contabilizarAmarelo->contaOcorrencias($consulta);
    $idJogador = $contabilizarAmarelo->listaOcorrencia($consulta, "idJogador");






    for ($i = 0; $i < $contagem; $i++) {

        $consulta = "SELECT sum(ththc.quantidadeCartoes) as amarelos FROM time_has_torneio_has_cartoes ththc
inner JOIN jogadores j 
ON
j.idJogador=ththc.IdJogador
inner JOIN times_has_torneios tht 
ON
tht.idTimeHasTorneiro=ththc.idTimeHasTorneio
INNER JOIN times t 
ON
t.idTime=tht.idTime
OR
t.idTime=tht.idTimeB
WHERE
ththc.idCartao=2
AND
j.idJogador='$idJogador[$i]'
AND
t.idTime='$idTime'";
        $contagemAmarelos = $contabilizarAmarelo->contaOcorrencias($consulta);
        $quantidadeAmarelos = $contabilizarAmarelo->listaOcorrencia($consulta, "amarelos");



        for ($j = 0; $j < $contagemAmarelos; $j++) {
           // echo "codigo jogador: $idJogador[$i] - quantidades amarelos: $quantidadeAmarelos[$j] ";

            if ($quantidadeAmarelos[$j] >= 3) {
             //   echo 'irá calcular';

                $consulta = "select totalAmarelo from jogadores where idJogador=$idJogador[$i]";

                $buscaAmarelos = $contabilizarAmarelo->listaOcorrencia($consulta, "totalAmarelo");

                foreach ($buscaAmarelos as $value) {

                    $auxiliar = $value;

                    $totalAmarelos = $auxiliar + $quantidadeAmarelos[$j];

                    $consultaAtualiza = "UPDATE jogadores SET totalAmarelo=$totalAmarelos WHERE idJogador='$idJogador[$i]'";
                    $contabilizarAmarelo->editarOcorrencia($consultaAtualiza);

                    $consultaDeleta = "DELETE FROM time_has_torneio_has_cartoes WHERE IdJogador='$idJogador[$i]'";
                    $contabilizarAmarelo->excluiOcorrencia($consultaDeleta);
                }
            }

            echo '<br />';
        }
    }
}

contabilizarAmarelos($idTimeA);
contabilizarAmarelos($idTimeB);
