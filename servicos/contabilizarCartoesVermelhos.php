<?php

/*
 * Programação verifica a quantidade de cartões amarelos
 * e se for de tres para cima contabiliza na 
 * tabela do jogador e apaga no histórico.
 * 
 * 
 */


function contabilizarVermelhos($idTime) {

    include './variaveisGlobais.php';
    $contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
    $consulta = "select * from jogadores";
    $contagem = $contabilizar->contaOcorrencias($consulta);
    $idJogador = $contabilizar->listaOcorrencia($consulta, "idJogador");





    for ($i = 0; $i < $contagem; $i++) {

        $consulta = "SELECT sum(ththc.quantidadeCartoes) as vermelhos FROM time_has_torneio_has_cartoes ththc
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
ththc.idCartao=1
AND
j.idJogador='$idJogador[$i]'
AND
t.idTime='$idTime'";
        $contagemVermelhos = $contabilizar->contaOcorrencias($consulta);
        $quantidadeVermelhos = $contabilizar->listaOcorrencia($consulta, "vermelhos");



        for ($j = 0; $j < $contagemVermelhos; $j++) {
          //  echo "codigo jogador: $idJogador[$i] - quantidades vermelhos: $quantidadeVermelhos[$j] ";

            if ($quantidadeVermelhos[$j] >= 1) {
             //   echo 'irá calcular';

                $consulta = "select totalVermelho from jogadores where idJogador=$idJogador[$i]";

                $buscaVermelhos = $contabilizar->listaOcorrencia($consulta, "totalVermelho");

                foreach ($buscaVermelhos as $value) {

                    $auxiliar = $value;

                    $totalVermelhos = $auxiliar + $quantidadeVermelhos[$j];

                    $consultaAtualiza = "UPDATE jogadores SET totalVermelho=$totalVermelhos WHERE idJogador='$idJogador[$i]'";
                    $contabilizar->editarOcorrencia($consultaAtualiza);

                    $consultaDeleta = "DELETE FROM time_has_torneio_has_cartoes WHERE IdJogador='$idJogador[$i]' AND idCartao=1";
                    $contabilizar->excluiOcorrencia($consultaDeleta);
                }
            }

            echo '<br />';
        }
    }
}

contabilizarVermelhos($idTimeA);
contabilizarVermelhos($idTimeB);
